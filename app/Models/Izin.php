<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IzinDispensasi;
use App\Models\IzinTerlambat;
use App\Models\Siswa;
use App\Models\Guru;

class IzinController extends Controller
{
    /**
     * ✅ Menampilkan Data Izin (untuk admin)
     */
    public function index()
    {
        // Ambil semua izin dispensasi + relasi
        $izin = IzinDispensasi::with(['siswa', 'guruPiket', 'guruPengajar'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.dataizin', compact('izin'));
    }

    /**
     * ✅ Tampilkan form pengajuan izin (oleh siswa)
     */
    public function create()
    {
        $guruPengajar = Guru::all();
        return view('pengajuanDispen', compact('guruPengajar'));
    }

    /**
     * ✅ Simpan pengajuan izin (siswa)
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'        => 'required|exists:siswa,id',
            'guru_pengajar_id'=> 'required|exists:guru,id',
            'tanggal_izin'    => 'required|date',
            'jam_mulai_keluar'=> 'required',
            'jam_akhir_kembali'=> 'required',
            'jenis_izin'      => 'required|string',
            'alasan_izin'     => 'required|string',
        ]);

        IzinDispensasi::create([
            'siswa_id'        => $request->siswa_id,
            'guru_piket_id'   => Auth::id(), // guru piket yang login
            'guru_pengajar_id'=> $request->guru_pengajar_id,
            'tanggal_izin'    => $request->tanggal_izin,
            'jam_mulai_keluar'=> $request->jam_mulai_keluar,
            'jam_akhir_kembali'=> $request->jam_akhir_kembali,
            'jenis_izin'      => $request->jenis_izin,
            'alasan_izin'     => $request->alasan_izin,
            'status_izin'     => 'menunggu',
        ]);

        return redirect()->route('riwayat.izin')->with('success', 'Pengajuan izin berhasil disimpan!');
    }

    /**
     * ✅ Riwayat izin khusus siswa yang login
     */
    public function riwayat()
    {
        $user = Auth::user();

        // Cek apakah user terkait siswa
        $siswa = Siswa::where('username', $user->username)->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan!');
        }

        $izin = IzinDispensasi::where('siswa_id', $siswa->id)->get();

        return view('riwayat', compact('izin'));
    }

    /**
     * ✅ Update status izin (disetujui / ditolak)
     */
    public function updateStatus($id, $status)
    {
        $izin = IzinDispensasi::findOrFail($id);

        if (!in_array($status, ['menunggu', 'disetujui', 'ditolak', 'terlaksana'])) {
            return redirect()->back()->with('error', 'Status tidak valid!');
        }

        $izin->update(['status_izin' => $status]);

        return redirect()->route('data-izin')->with('success', 'Status izin berhasil diperbarui!');
    }
}
