<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected  $primaryKey='slide_id';
    protected $fillable = [
        'adi', 'video','baslik','altbaslik','buton','yazi'
    ];
}
