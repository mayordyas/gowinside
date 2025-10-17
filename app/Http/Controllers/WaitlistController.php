<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaitlistController extends Controller
{
    public function index()
    {
        $dispensasi = DB::table('view_izin_dispensasi_lengkap')->get();
        $terlambat  = DB::table('view_izin_terlambat_lengkap')->get();

        // Gabungkan data jadi Collection
        $all = collect($dispensasi)->map(function($d){
    return (object)[
        'id'            => $d->id,
        'nama_siswa'    => $d->nama_siswa,
        'kelas'         => $d->nama_kelas,
        'jenis'         => 'dispensasi',
        'alasan'        => $d->alasan_izin,
        'tanggal'       => $d->tanggal_izin,
        'jam_awal'      => $d->jam_mulai_keluar,   // jam awal keluar
        'jam_akhir'     => $d->jam_akhir_kembali,  // jam kembali
        'guru_piket'    => $d->guru_piket,
        'guru_pengajar' => $d->guru_pengajar,
        'status'        => $d->status_izin,
        'created_at'    => $d->created_at,
    ];
})
->merge(
    collect($terlambat)->map(function($t){
        return (object)[
            'id'            => $t->id,
            'nama_siswa'    => $t->nama_siswa,
            'kelas'         => $t->nama_kelas,
            'jenis'         => 'terlambat',
            'alasan'        => $t->alasan_terlambat,
            'tanggal'       => $t->tanggal_terlambat,
            'jam_awal'      => $t->jam_masuk,  // jam awal masuk
            'jam_akhir'     => null,           // tidak ada jam kembali
            'guru_piket'    => $t->guru_piket,
            'guru_pengajar' => $t->guru_pengajar,
            'status'        => $t->status_izin,
            'created_at'    => $t->created_at,
        ];
    })
)
->sortByDesc('created_at');


        return view('waitlist', ['data' => $all]);
    }

    public function updateStatus($id, $status)
    {
        if (!in_array($status, ['menunggu','disetujui','ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }

        $dispensasi = DB::table('izin_dispensasi')->where('id', $id)->first();
        $terlambat  = DB::table('izin_terlambat')->where('id', $id)->first();

        if ($dispensasi) {
            DB::table('izin_dispensasi')->where('id', $id)->update(['status_izin' => $status]);
        } elseif ($terlambat) {
            DB::table('izin_terlambat')->where('id', $id)->update(['status_izin' => $status]);
        } else {
            return redirect()->back()->with('error', 'Data izin tidak ditemukan');
        }

        return redirect()->route('waitlist')->with('success', 'Status berhasil diperbarui');
    }
}
