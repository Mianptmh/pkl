<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = ['nama', 'umur', 'alamat', 'kelas', 'hobby'];
    
}
