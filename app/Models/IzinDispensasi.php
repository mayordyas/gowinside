<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IzinDispensasi extends Model
{
    use HasFactory;

    protected $table = 'izin_dispensasi';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'tanggal_mulai',
        'waktu_mulai',
        'waktu_kembali',
        'jenis',
        'alasan',
        'status_izin',
        'guru_id',   // konsisten pakai guru_id
        'siswa_id',
        'no_hp_siswa'
    ];

    /**
     * Casting kolom tanggal jadi Carbon instance
     */
    protected $casts = [
        'tanggal_mulai' => 'datetime',
        // kalau ada tanggal_selesai bisa tambahkan:
        // 'tanggal_selesai' => 'datetime',
    ];

    /**
     * Relasi ke siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    /**
     * Relasi ke guru
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
