@extends('layouts.app')

@section('content')
<h1>Halaman Riwayat Izin</h1>

<form method="GET" action="{{ route('riwayat.izin') }}">
    <input type="text" name="search" placeholder="Cari nama siswa / guru">
    <button type="submit">Cari</button>
</form>

<h2>Izin Dispensasi</h2>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>No HP</th>
            <th>Tanggal Izin</th>
            <th>Jam Keluar</th>
            <th>Jam Kembali</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Guru Piket</th>
            <th>Guru Pengajar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dispensasi as $i => $d)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $d->nama_siswa }}</td>
            <td>{{ $d->nama_kelas }}</td>
            <td>{{ $d->no_hp_siswa }}</td>
            <td>{{ $d->tanggal_izin }}</td>
            <td>{{ $d->jam_mulai_keluar }}</td>
            <td>{{ $d->jam_akhir_kembali }}</td>
            <td>{{ $d->jenis_izin }}</td>
            <td>{{ $d->status_izin }}</td>
            <td>{{ $d->guru_piket }}</td>
            <td>{{ $d->guru_pengajar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Izin Terlambat</h2>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tanggal Terlambat</th>
            <th>Jam Masuk</th>
            <th>Alasan</th>
            <th>Status</th>
            <th>Guru Piket</th>
            <th>Guru Pengajar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($terlambat as $i => $t)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $t->nama_siswa }}</td>
            <td>{{ $t->nama_kelas }}</td>
            <td>{{ $t->tanggal_terlambat }}</td>
            <td>{{ $t->jam_masuk }}</td>
            <td>{{ $t->alasan_terlambat }}</td>
            <td>{{ $t->status_izin }}</td>
            <td>{{ $t->guru_piket }}</td>
            <td>{{ $t->guru_pengajar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
