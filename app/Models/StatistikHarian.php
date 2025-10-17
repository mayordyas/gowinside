<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikHarian extends Model
{
    use HasFactory;

    protected $table = 'statistik_harian';

    protected $fillable = [
        'tanggal',
        'total_izin_dispensasi',
        'total_izin_terlambat',
        'total_disetujui',
        'total_ditolak',
        'total_terlaksana',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}