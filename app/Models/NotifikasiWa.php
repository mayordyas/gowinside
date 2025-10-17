<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiWa extends Model
{
    use HasFactory;

    protected $table = 'notifikasi_wa';

    protected $fillable = [
        'izin_id',
        'jenis_izin',
        'no_wa_tujuan',
        'pesan',
        'status_kirim',
    ];
}