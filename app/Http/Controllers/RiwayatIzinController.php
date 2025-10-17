<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IzinDispensasiLengkap;
use App\Models\IzinTerlambatLengkap;

class RiwayatIzinController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter (opsional)
        $search = $request->input('search');

        $dispensasi = IzinDispensasiLengkap::query();
        $terlambat  = IzinTerlambatLengkap::query();

        if ($search) {
            $dispensasi->where('nama_siswa', 'like', "%$search%")
                       ->orWhere('guru_pengajar', 'like', "%$search%");
            $terlambat->where('nama_siswa', 'like', "%$search%")
                      ->orWhere('guru_pengajar', 'like', "%$search%");
        }

        return view('riwayat_izin.index', [
            'dispensasi' => $dispensasi->orderBy('tanggal_izin','desc')->get(),
            'terlambat'  => $terlambat->orderBy('tanggal_terlambat','desc')->get()
        ]);
    }
}
