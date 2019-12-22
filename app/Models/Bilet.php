<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bilet extends Model
{
    protected  $primaryKey='bilet_id';
    protected $fillable = [
        'bilet_no','barkod','seans_id', 'koltuk','seans_tarihi','musteri_adi','musteri_telefon','musteri_mail','fiyat_grubu',
        'toplam_tutar','rezervasyon_bilet','odeme_sekli','odeme_kodu','iptal'
    ];

    public  function Sean(){
        $this->belongsTo('App\Models\Sean','seans_id');
    }


}
