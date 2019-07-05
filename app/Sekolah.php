<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
     protected $fillable = ['nama_siswa', 'umur', 'alamat', 'kelas', 'jenis_kelamin'];
    
}
