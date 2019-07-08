<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['nama_tag', 'slug'];
    public $timetamps = true;

    public function artikel()
    {
        return $this->belongsToMany('App\Artikel','artikel_tag', 'id_tag');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($artikel) {
            // mengecek apakah penulis masih punya akun
            if ($artikel->artikel->count() > 0) {
                //menyiapkan pesan eror
                $html = 'artikel Tidak Dihapus';
                $html = '<ul>';
                foreach ($artikel->artikel as $data) {
                    $html = "<li>$data->judul</li>";
                }
                $html = '<lu>';
                Session::flash("flash_notification", [
                    "level" => "danger",
                    "message" => $html
                ]);
                // membatalkan proses penghapusan
                return false;
            }
        });
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
