<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IzinDispensasi;
use App\Models\Siswa;
use App\Models\Guru;

class IzinController extends Controller
{
    // Menampilkan data izin (Admin)
    public function index(Request $request)
    {
        // Ambil data izin dengan relasi siswa dan guru
        $query = IzinDispensasi::with(['siswa', 'guru'])
            ->leftJoin('siswa', 'izin_dispensasi.siswa_id', '=', 'siswa.id')
            ->leftJoin('guru as guru_piket', 'izin_dispensasi.guru_piket_id', '=', 'guru_piket.id')
            ->leftJoin('guru as guru_pengajar', 'izin_dispensasi.guru_pengajar_id', '=', 'guru_pengajar.id')
            ->select(
                'izin_dispensasi.*',
                'siswa.nama_siswa',
                'siswa.kelas_id',
                'guru_piket.nama_guru as nama_guru_piket',
                'guru_pengajar.nama_guru as nama_guru_pengajar'
            );

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('izin_dispensasi.status_izin', $request->status);
        }

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('izin_dispensasi.tanggal_izin', $request->tanggal);
        }

        // Search berdasarkan nama siswa atau kelas
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('siswa.nama_siswa', 'like', "%{$search}%")
                  ->orWhere('siswa.kelas_id', 'like', "%{$search}%");
            });
        }

        $izin = $query->latest('izin_dispensasi.created_at')->paginate(10);

        // Statistik
        $menunggu = IzinDispensasi::where('status_izin', 'menunggu')->count();
        $disetujui = IzinDispensasi::where('status_izin', 'disetujui')->count();
        $ditolak = IzinDispensasi::where('status_izin', 'ditolak')->count();
        $terlaksana = IzinDispensasi::where('status_izin', 'terlaksana')->count();

        return view('dataizin', compact('izin', 'menunggu', 'disetujui', 'ditolak', 'terlaksana'));
    }

    // Form pengajuan izin siswa
    public function create()
    {
        $guruPengajar = Guru::all();
        return view('pengajuanDispen', compact('guruPengajar'));
    }

    // Simpan pengajuan izin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'guru_pengajar_id' => 'required|exists:guru,id',
            'tanggal_izin' => 'required|date',
            'jam_mulai_keluar' => 'required|date_format:H:i',
            'jam_akhir_kembali' => 'required|date_format:H:i|after:jam_mulai_keluar',
            'jenis_izin' => 'required|string|max:50',
            'alasan_izin' => 'required|string|max:255',
        ]);

        IzinDispensasi::create([
            'siswa_id' => $validated['siswa_id'],
            'guru_piket_id' => Auth::id(),
            'guru_pengajar_id' => $validated['guru_pengajar_id'],
            'tanggal_izin' => $validated['tanggal_izin'],
            'jam_mulai_keluar' => $validated['jam_mulai_keluar'],
            'jam_akhir_kembali' => $validated['jam_akhir_kembali'],
            'jenis_izin' => $validated['jenis_izin'],
            'alasan_izin' => $validated['alasan_izin'],
            'status_izin' => 'menunggu',
        ]);

        return redirect()->route('riwayat.izin')->with('success', 'Pengajuan izin berhasil disimpan!');
    }

    // Riwayat izin siswa
    public function riwayat()
    {
        $user = Auth::user();
        $siswa = Siswa::where('username', $user->username)->first();
        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan!');
        }

        $izin = IzinDispensasi::where('siswa_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('riwayat', compact('izin'));
    }

    // Update status izin (admin/guru)
    public function updateStatus(IzinDispensasi $izin, $status)
    {
        if (!in_array($status, ['menunggu','disetujui','ditolak','terlaksana'])) {
            return redirect()->back()->with('error','Status tidak valid!');
        }

        $izin->update(['status_izin' => $status]);
        return redirect()->route('data-izin')->with('success','Status izin berhasil diperbarui!');
    }

    // Hapus data izin
    public function destroy(IzinDispensasi $izin)
    {
        $izin->delete();
        return back()->with('success','Data izin berhasil dihapus.');
    }

    // Get detail izin untuk modal
    public function getDetail($id)
    {
        $izin = IzinDispensasi::with(['siswa', 'guru'])
            ->leftJoin('siswa', 'izin_dispensasi.siswa_id', '=', 'siswa.id')
            ->leftJoin('guru as guru_piket', 'izin_dispensasi.guru_piket_id', '=', 'guru_piket.id')
            ->leftJoin('guru as guru_pengajar', 'izin_dispensasi.guru_pengajar_id', '=', 'guru_pengajar.id')
            ->select(
                'izin_dispensasi.*',
                'siswa.nama_siswa',
                'siswa.kelas_id',
                'guru_piket.nama_guru as nama_guru_piket',
                'guru_pengajar.nama_guru as nama_guru_pengajar'
            )
            ->where('izin_dispensasi.id', $id)
            ->first();

        if (!$izin) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($izin);
    }
}
