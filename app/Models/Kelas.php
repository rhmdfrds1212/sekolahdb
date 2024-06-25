<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'jurusan_id','no','nama','wali','jumlah','motto'
    ];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
