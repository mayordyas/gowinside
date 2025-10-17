<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guru; // <-- WAJIB, biar Guru::findOrFail bisa jalan

class ProfilPiketController extends Controller
{
    // Tampilkan Profil
    public function show($id)
    {
        $guru = DB::table('guru')
            ->leftJoin('mata_pelajaran', 'guru.mapel_id', '=', 'mata_pelajaran.id')
            ->select('guru.*', 'mata_pelajaran.nama_mapel')
            ->where('guru.id', $id)
            ->first();

        if (!$guru) {
            abort(404, 'Guru tidak ditemukan');
        }

        $bulanIni = now()->format('Y-m');

        $totalDispensasi = DB::table('izin_dispensasi')
            ->where('guru_piket_id', $id)
            ->where('status_izin', 'disetujui')
            ->whereRaw("DATE_FORMAT(tanggal_izin, '%Y-%m') = ?", [$bulanIni])
            ->count();

        $totalTerlambat = DB::table('izin_terlambat')
            ->where('guru_piket_id', $id)
            ->where('status_izin', 'disetujui')
            ->whereRaw("DATE_FORMAT(tanggal_terlambat, '%Y-%m') = ?", [$bulanIni])
            ->count();

        $totalIzinDitangani = $totalDispensasi + $totalTerlambat;

        return view('profilpiket', compact('guru', 'totalIzinDitangani', 'totalDispensasi', 'totalTerlambat'));
    }

    // Update Profil
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $data = $request->validate([
            'nama_guru'     => 'required|string|max:100',
            'nip'           => 'nullable|string|max:50',
            'no_wa'         => 'nullable|string|max:20',
            'email'         => 'nullable|email',
            'tanggal_lahir' => 'nullable|date',
            'mapel_text'    => 'nullable|string|max:100',
            'alamat'        => 'nullable|string|max:255',
            'jabatan'       => 'nullable|string|max:50',
            'foto_profil'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('guru-foto', 'public');
            $data['foto_profil'] = '/storage/' . $path;
        }

        $guru->update($data);

        return redirect()->route('profilpiket.show', $guru->id)
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
