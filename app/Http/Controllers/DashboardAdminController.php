<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index(Request $request)
    {
        // --- COUNTS (gabungkan kedua tabel izin) ---
        $izinMenunggu   = 0;
        $izinDisetujui  = 0;
        $izinDitolak    = 0;
        $izinTerlaksana = 0;

        if (Schema::hasTable('izin_dispensasi')) {
            $izinMenunggu   += DB::table('izin_dispensasi')->where('status_izin', 'menunggu')->count();
            $izinDisetujui  += DB::table('izin_dispensasi')->where('status_izin', 'disetujui')->count();
            $izinDitolak    += DB::table('izin_dispensasi')->where('status_izin', 'ditolak')->count();
            $izinTerlaksana += DB::table('izin_dispensasi')->where('status_izin', 'terlaksana')->count();
        }

        if (Schema::hasTable('izin_terlambat')) {
            $izinMenunggu   += DB::table('izin_terlambat')->where('status_izin', 'menunggu')->count();
            $izinDisetujui  += DB::table('izin_terlambat')->where('status_izin', 'disetujui')->count();
            $izinDitolak    += DB::table('izin_terlambat')->where('status_izin', 'ditolak')->count();
        }

        // --- GURU aktif (ambil 1 guru / pertama) ---
        $guru = DB::table('guru')
            ->select('id','nama_guru','foto_profil','mapel_id','is_piket')
            ->first();

        // --- SECURITY / petugas (banyak data) ---
        $security = DB::table('guru')
            ->join('users', 'guru.user_id', '=', 'users.id')
            ->where('users.role', 'guru_piket')
            ->select('guru.id', 'guru.nama_guru as nama', 'guru.foto_profil as foto', 'users.role', 'guru.is_piket')
            ->limit(12)
            ->get();

        // --- QR stats ---
        $qrHariIni = 0;
        $qrAktif   = 0;
        $qrScan    = 0;

        if (Schema::hasTable('qr_codes')) {
            $qrHariIni = DB::table('qr_codes')->whereDate('created_at', Carbon::today())->count();
            $qrAktif   = DB::table('qr_codes')->where('status', 'aktif')->count();
            $qrScan    = Schema::hasTable('qr_scans') ? DB::table('qr_scans')->count() : 0;
        }

        // --- Chart data ---
        if (Schema::hasTable('view_statistik_izin')) {
            $stat = DB::table('view_statistik_izin')->orderBy('tanggal')->get();
            $chartLabels = $stat->pluck('tanggal')->toArray();
            $chartData   = $stat->map(function ($r) {
                return (int) ($r->total ?? (($r->menunggu ?? 0) + ($r->disetujui ?? 0) + ($r->ditolak ?? 0) + ($r->terlaksana ?? 0)));
            })->toArray();
        } else {
            $days = 14;
            $chartLabels = [];
            $chartData   = [];

            for ($i = $days - 1; $i >= 0; $i--) {
                $d = Carbon::today()->subDays($i)->toDateString();
                $chartLabels[] = $d;

                $count = 0;
                if (Schema::hasTable('izin_dispensasi')) {
                    $count += DB::table('izin_dispensasi')->whereDate('created_at', $d)->count();
                }
                if (Schema::hasTable('izin_terlambat')) {
                    $count += DB::table('izin_terlambat')->whereDate('created_at', $d)->count();
                }
                $chartData[] = $count;
            }
        }

        // --- PASS ke view ---
        return view('dashboardadmin', compact(
            'izinMenunggu', 'izinDisetujui', 'izinDitolak', 'izinTerlaksana',
            'guru', 'security',
            'qrHariIni', 'qrAktif', 'qrScan',
            'chartLabels', 'chartData'
        ));
    }
}
