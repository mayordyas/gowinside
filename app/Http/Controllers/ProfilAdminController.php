<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilAdminController extends Controller
{
    public function index()
    {
        // Ambil data admin yang sedang login
        $admin = Auth::user();
        
        // Jika belum ada admin, gunakan data default
        if (!$admin) {
            $admin = (object) [
                'id' => 1,
                'username' => 'admin1',
                'name' => 'Muhammad Admin',
                'email' => 'admin@smkn13bdg.sch.id',
                'phone' => '+62 812-3456-7890',
                'bio' => 'Administrator sistem GOW INSIDE yang berpengalaman dalam mengelola data siswa dan guru.',
                'role' => 'admin',
                'profile_photo' => null,
                'is_active' => true
            ];
        } else {
            // Tambahkan data default untuk field yang tidak ada di tabel
            $admin->name = $admin->name ?? 'Muhammad Admin';
            $admin->email = $admin->email ?? 'admin@smkn13bdg.sch.id';
            $admin->phone = $admin->phone ?? '+62 812-3456-7890';
            $admin->bio = $admin->bio ?? 'Administrator sistem GOW INSIDE yang berpengalaman dalam mengelola data siswa dan guru.';
            $admin->profile_photo = $admin->profile_photo ?? null;
        }

        // Ambil statistik admin
        $stats = $this->getAdminStats();

        return view('profiladmin', compact('admin', 'stats'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();
        
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $admin->id,
        ]);

        $data = [
            'username' => $request->username,
            'updated_at' => now()
        ];

        DB::table('users')->where('id', $admin->id)->update($data);

        return redirect()->route('profile-admin')->with('success', 'Profil berhasil diperbarui!');
    }

    public function changePassword(Request $request)
    {
        $admin = Auth::user();
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // Verifikasi password lama
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        // Update password
        DB::table('users')->where('id', $admin->id)->update([
            'password' => Hash::make($request->password),
            'updated_at' => now()
        ]);

        return redirect()->route('profile-admin')->with('success', 'Password berhasil diubah!');
    }

    private function getAdminStats()
    {
        // Ambil statistik admin dari berbagai tabel
        $totalGuru = DB::table('guru')->count();
        $totalSiswa = DB::table('siswa')->count();
        
        // Hitung total izin dari kedua tabel izin
        $totalDispensasi = DB::table('izin_dispensasi')->count();
        $totalTerlambat = DB::table('izin_terlambat')->count();
        $totalIzin = $totalDispensasi + $totalTerlambat;
        
        // Hitung izin yang sudah diproses (disetujui)
        $izinDispensasiDisetujui = DB::table('izin_dispensasi')->where('status_izin', 'disetujui')->count();
        $izinTerlambatDisetujui = DB::table('izin_terlambat')->where('status_izin', 'disetujui')->count();
        $izinDiproses = $izinDispensasiDisetujui + $izinTerlambatDisetujui;

        return [
            'total_guru' => $totalGuru,
            'total_siswa' => $totalSiswa,
            'total_izin' => $totalIzin,
            'izin_diproses' => $izinDiproses,
            'last_login' => now()->format('H:i'),
            'uptime' => '98%',
            'tasks_done' => 156,
            'rating' => '4.9',
            'actions' => '2.5k'
        ];
    }
}
