<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'url_guru','nuptk','nama','jenis_kelamin','email','alamat','jurusan_id','tempat_lahir','tanggal_lahir'
    ];
    
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
