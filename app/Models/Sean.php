<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sean extends Model
{
    protected  $primaryKey='seans_id';
    protected $fillable = [
        'salon_id', 'movie_id','bitis_tarihi','saat','standart_fiyat','hafta_sonu_fiyati','fix_fiyat'
    ];

    public  function Salon(){
        $this->belongsTo('App\Models\Salon','salon_id');
    }
    public  function Filim(){
        $this->belongsTo('App\Models\Filim','movie_id');
    }
    public  function Bilet()
    {
        return $this->hasMany('App\Models\Bilet','seans_id');
    }
    public  function Seans_Fiyat()
    {
        return $this->hasMany('App\Models\Seans_Fiyat','seans_id');
    }



}
