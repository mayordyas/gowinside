<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Daftar guru
    public function index()
    {
        $gurus = Guru::with('matapelajaran')->paginate(12);
        $totalGuru = Guru::count();

        return view('dataguru', compact('gurus', 'totalGuru'));
    }

    // Form tambah guru
    public function create()
    {
        $mapels = MataPelajaran::all();
        return view('tambahguru', compact('mapels'));
    }

    // Simpan guru baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_guru'=>'required|string',
            'username'=>'required|string|unique:guru',
            'nip'=>'nullable|string',
            'mapel_id'=>'nullable|exists:mapels,id',
            'no_telp'=>'nullable|string',
            'status'=>'required|in:aktif,nonaktif',
            'foto_profil'=>'nullable|image|max:2048'
        ]);

        if($request->hasFile('foto_profil')){
            $data['foto_profil'] = $request->file('foto_profil')->store('profil', 'public');
        }

        Guru::create($data);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    // Form edit guru
    public function edit(Guru $guru)
    {
        $mapels = MataPelajaran::all();
        return view('editguru', compact('guru', 'mapels'));
    }

    // Update guru
    public function update(Request $request, Guru $guru)
    {
        $data = $request->validate([
            'nama_guru'=>'required|string',
            'username'=>'required|string|unique:guru,username,'.$guru->id,
            'nip'=>'nullable|string',
            'mapel_id'=>'nullable|exists:mapels,id',
            'no_telp'=>'nullable|string',
            'status'=>'required|in:aktif,nonaktif',
            'foto_profil'=>'nullable|image|max:2048'
        ]);

        if($request->hasFile('foto_profil')){
            $data['foto_profil'] = $request->file('foto_profil')->store('profil', 'public');
        }

        $guru->update($data);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diupdate');
    }

    // Hapus guru
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus');
    }

    // Reset PIN
    public function resetPin(Guru $guru)
    {
        $guru->pin = rand(1000,9999);
        $guru->save();
        return redirect()->route('guru.index')->with('success', 'PIN berhasil direset');
    }

    // Toggle status aktif/nonaktif
    public function toggleStatus(Guru $guru)
    {
        $guru->status = $guru->status === 'aktif' ? 'nonaktif' : 'aktif';
        $guru->save();
        return redirect()->route('guru.index')->with('success', 'Status akun berhasil diubah');
    }
}
