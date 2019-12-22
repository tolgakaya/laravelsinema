<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    //
    protected  $primaryKey='salon_id';
    protected $fillable = [
        'salon_adi', 'aciklama'
    ];
    public  function Sean()
    {
        return $this->hasMany('App\Models\Sean','seans_id');
    }
    public  function Salon()
    {
        return $this->hasOne('App\Models\Salon','salon_id');
    }
}
