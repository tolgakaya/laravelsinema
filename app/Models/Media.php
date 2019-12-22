<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected  $primaryKey='media_id';
    protected $table='medias';
    protected $fillable = [
        'movie_id', 'adi','uzanti','poster','video','galeri','tumb','url'
    ];

    public  function Filim(){
        $this->belongsTo('App\Models\Filim','movie_id');
    }
}
