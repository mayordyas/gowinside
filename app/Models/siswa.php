<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas_id',
        'no_wa_siswa',
        'no_wa_ortu',
        'wali_kelas_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }

    public function izinDispensasi()
    {
        return $this->hasMany(IzinDispensasi::class);
    }

    public function izinTerlambat()
    {
        return $this->hasMany(IzinTerlambat::class);
    }
}