<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telat extends Model
{
    use HasFactory;

    protected $table = 'telat'; // sesuaikan dengan nama tabel di DB

    protected $fillable = [
        'nama_siswa',
        'kelas',
        'no_hp_siswa',
        'tanggal',
        'waktu_datang',
        'alasan',
        'guru_id',
        'status'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
