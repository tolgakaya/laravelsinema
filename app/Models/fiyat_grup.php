<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fiyat_grup extends Model
{
    protected $primaryKey='grup_id';
    protected $fillable = [
        'grup_adi', 'aciklama'
    ];
    public  function Seans_Fiyat()
    {
        return $this->hasMany('App\Models\Seans_Fiyat','grup_id');
    }
}
