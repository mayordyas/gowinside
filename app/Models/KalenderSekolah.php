<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderSekolah extends Model
{
    use HasFactory;

    protected $table = 'kalender_sekolah';

    protected $fillable = [
        'tanggal',
        'nama_kegiatan',
        'jenis_kegiatan',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}