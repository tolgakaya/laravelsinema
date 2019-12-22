<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filim extends Model
{
    protected $primaryKey = 'movie_id';
    protected $fillable = [
        'adi', 'yonetmen', 'oyuncular', 'konu', 'ulke', 'yas_siniri','yil', 'kategori', 'suresi', 'gosterimde', 'gelecek',
    ];

    public function Galeri()
    {
        return $this->hasMany('App\Models\Galeri', 'movie_id');
    }
    public function Media()
    {
        return $this->hasMany('App\Models\Media', 'movie_id');
    }
    public function Sean()
    {
        return $this->hasMany('App\Models\Sean', 'movie_id');
    }

    public static $kontrol = array(
        'adi' => 'required|max:255',
        'yonetmen' => 'required|max:255',
        'oyuncular' => 'required|max:255',
        'konu' => 'required|max:255',
        'ulke' => 'required|max:255',
        'yas_siniri' => 'required|max:255',
        'yil' => 'required|max:255',
        'kategori' => 'required|max:255',
        'suresi' => 'required|max:255',
        'gelgors' => 'required|max:255',
    );

}
