<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seans_Fiyat extends Model
{
    protected  $primaryKey='fiyat_id';
    protected $table='seans_fiyats';
    protected $fillable = [
        'seans_id', 'grup_id','standart_fiyat','hafta_sonu_fiyati','iskonto_orani','sabit_fiyat','bilet_adedi','gecerlilik_tarihi','iptal'
    ];

    public  function Sean(){
        $this->belongsTo('App\Models\Sean','seans_id');
    }
    public  function fiyat_grup(){
        $this->belongsTo('App\Models\fiyat_grup','grup_id');
    }

}
