<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinTerlambat extends Model
{
    use HasFactory;

    protected $table = 'izin_terlambat';

    protected $fillable = [
        'siswa_id',
        'guru_piket_id',
        'guru_pengajar_id',
        'tanggal_terlambat',
        'jam_masuk',
        'alasan_terlambat',
        'hukuman',
        'catatan_piket',
        'status_izin',
        'catatan_guru',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function guruPiket()
    {
        return $this->belongsTo(Guru::class, 'guru_piket_id');
    }

    public function guruPengajar()
    {
        return $this->belongsTo(Guru::class, 'guru_pengajar_id');
    }
}
