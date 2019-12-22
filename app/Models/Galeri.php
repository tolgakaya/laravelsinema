<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected  $primaryKey='galeri_id';
    protected $fillable = [
        'movie_id', 'tur','sayfa','kod','adi','uzanti','url'
    ];

    public  function Filim(){
        $this->belongsTo('App\Models\Filim','movie_id');
    }
}
