<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'url_siswa','nisn','nama','jenis_kelamin','alamat','jurusan_id','kelas_id','guru_id','eskul_id','tempat_lahir','tanggal_lahir'
    ];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    public function eskul(){
        return $this->belongsTo(Eskul::class, 'eskul_id');
    }
}
