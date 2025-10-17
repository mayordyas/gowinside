<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru'; // nama tabel sesuai database
    protected $fillable = [
        'nama_guru', 'username', 'nip', 'mapel_id', 'no_telp', 'status', 'foto_profil', 'pin'
    ];

    public function matapelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    public function izin()
    {
        return $this->hasMany(Izin::class); // jika ada relasi izin
    }
}
