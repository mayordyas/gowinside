<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran'; // nama tabel sesuai database
    protected $fillable = ['nama_mapel'];

    public function gurus()
    {
        return $this->hasMany(Guru::class, 'mapel_id'); // relasi ke Guru
    }
}
