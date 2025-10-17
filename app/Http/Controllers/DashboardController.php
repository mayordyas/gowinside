<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString();
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;

        // Data user login
        $user = Auth::user();
        $guru = DB::table('guru')->where('user_id', $user->id)->first();

        // === Ringkasan izin hari ini ===
        $izinDispensasiHariIni = DB::table('izin_dispensasi')
            ->whereDate('tanggal_izin', $today)
            ->selectRaw("
                SUM(CASE WHEN status_izin = 'menunggu' THEN 1 ELSE 0 END) as menunggu,
                SUM(CASE WHEN status_izin = 'disetujui' THEN 1 ELSE 0 END) as disetujui,
                SUM(CASE WHEN status_izin = 'ditolak' THEN 1 ELSE 0 END) as ditolak,
                SUM(CASE WHEN status_izin = 'terlaksana' THEN 1 ELSE 0 END) as terlaksana
            ")->first();

        $izinTerlambatHariIni = DB::table('izin_terlambat')
            ->whereDate('tanggal_terlambat', $today)
            ->selectRaw("
                SUM(CASE WHEN status_izin = 'menunggu' THEN 1 ELSE 0 END) as menunggu,
                SUM(CASE WHEN status_izin = 'disetujui' THEN 1 ELSE 0 END) as disetujui,
                SUM(CASE WHEN status_izin = 'ditolak' THEN 1 ELSE 0 END) as ditolak
            ")->first();

        $izinMenunggu   = ($izinDispensasiHariIni->menunggu ?? 0) + ($izinTerlambatHariIni->menunggu ?? 0);
        $izinDisetujui  = ($izinDispensasiHariIni->disetujui ?? 0) + ($izinTerlambatHariIni->disetujui ?? 0);
        $izinDitolak    = ($izinDispensasiHariIni->ditolak ?? 0) + ($izinTerlambatHariIni->ditolak ?? 0);
        $izinTerlaksana = ($izinDispensasiHariIni->terlaksana ?? 0);

        // === Statistik bulanan (gabungan dispensasi + terlambat) ===
        $dispensasiBulanan = DB::table('izin_dispensasi')
            ->selectRaw("
                DATE(tanggal_izin) as tanggal,
                SUM(CASE WHEN status_izin = 'menunggu' THEN 1 ELSE 0 END) as menunggu,
                SUM(CASE WHEN status_izin = 'disetujui' THEN 1 ELSE 0 END) as disetujui,
                SUM(CASE WHEN status_izin = 'ditolak' THEN 1 ELSE 0 END) as ditolak,
                SUM(CASE WHEN status_izin = 'terlaksana' THEN 1 ELSE 0 END) as terlaksana
            ")
            ->whereMonth('tanggal_izin', $bulan)
            ->whereYear('tanggal_izin', $tahun)
            ->groupBy('tanggal');

        $terlambatBulanan = DB::table('izin_terlambat')
            ->selectRaw("
                DATE(tanggal_terlambat) as tanggal,
                SUM(CASE WHEN status_izin = 'menunggu' THEN 1 ELSE 0 END) as menunggu,
                SUM(CASE WHEN status_izin = 'disetujui' THEN 1 ELSE 0 END) as disetujui,
                SUM(CASE WHEN status_izin = 'ditolak' THEN 1 ELSE 0 END) as ditolak,
                0 as terlaksana
            ")
            ->whereMonth('tanggal_terlambat', $bulan)
            ->whereYear('tanggal_terlambat', $tahun)
            ->groupBy('tanggal');

        $statBulanan = $dispensasiBulanan
            ->unionAll($terlambatBulanan)
            ->orderBy('tanggal')
            ->get();

        // === Alasan izin terbanyak bulan ini ===
        $alasanDispensasi = DB::table('izin_dispensasi')
            ->select('alasan_izin', DB::raw('COUNT(*) as total'))
            ->whereMonth('tanggal_izin', $bulan)
            ->whereYear('tanggal_izin', $tahun)
            ->groupBy('alasan_izin')
            ->get();

        $alasanTerlambat = DB::table('izin_terlambat')
            ->select(DB::raw('alasan_terlambat as alasan_izin'), DB::raw('COUNT(*) as total'))
            ->whereMonth('tanggal_terlambat', $bulan)
            ->whereYear('tanggal_terlambat', $tahun)
            ->groupBy('alasan_terlambat')
            ->get();

        $alasanIzin = $alasanDispensasi->concat($alasanTerlambat)
            ->groupBy('alasan_izin')
            ->map(fn($items, $alasan) => (object)[
                'alasan_izin' => $alasan,
                'total' => $items->sum('total')
            ])
            ->sortByDesc('total')
            ->values()
            ->take(5);

        // === Perbandingan kelas bulan ini ===
        $kelasDispensasi = DB::table('izin_dispensasi as id')
            ->join('siswa as s', 'id.siswa_id', '=', 's.id')
            ->join('kelas as k', 's.kelas_id', '=', 'k.id')
            ->select('k.nama_kelas', DB::raw('COUNT(*) as total'))
            ->whereMonth('id.tanggal_izin', $bulan)
            ->whereYear('id.tanggal_izin', $tahun)
            ->groupBy('k.nama_kelas')
            ->get();

        $kelasTerlambat = DB::table('izin_terlambat as it')
            ->join('siswa as s', 'it.siswa_id', '=', 's.id')
            ->join('kelas as k', 's.kelas_id', '=', 'k.id')
            ->select('k.nama_kelas', DB::raw('COUNT(*) as total'))
            ->whereMonth('it.tanggal_terlambat', $bulan)
            ->whereYear('it.tanggal_terlambat', $tahun)
            ->groupBy('k.nama_kelas')
            ->get();

        $kelasIzin = $kelasDispensasi->concat($kelasTerlambat)
            ->groupBy('nama_kelas')
            ->map(fn($items, $kelas) => (object)[
                'nama_kelas' => $kelas,
                'total' => $items->sum('total')
            ])
            ->sortByDesc('total')
            ->values();

        // === Kalender sekolah bulan ini ===
        $kalender = DB::table('kalender_sekolah')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal')
            ->get();

        return view('dashboardpiket', compact(
            'user', 'guru',
            'izinMenunggu', 'izinDisetujui', 'izinDitolak', 'izinTerlaksana',
            'statBulanan', 'alasanIzin', 'kelasIzin', 'kalender'
        ));
    }
}