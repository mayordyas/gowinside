<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telat;
use App\Models\Guru;

class TelatController extends Controller
{
    public function create()
    {
        $guruPengajar = Guru::all();
        return view('pengajuanTelat', compact('guruPengajar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa'   => 'required|string|max:100',
            'kelas'        => 'required|string|max:50',
            'no_hp_siswa'  => 'required|string|max:15',
            'tanggal'      => 'required|date',
            'waktu_datang' => 'required',
            'alasan'       => 'required|string',
            'guru_id'      => 'required|exists:guru,id',
        ]);

        Telat::create($request->all() + ['status' => 'menunggu']);

        return redirect()->route('riwayat')->with('success', 'Pengajuan telat berhasil diajukan!');
    }
}
