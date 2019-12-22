<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalonDuzen extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'SalonDuzens';
    protected $fillable = [
        'salon_id', 'sits_line', 'sits_row', 'sits_number'
    ];

    public function Salon()
    {
        $this->belongsTo('App\Models\Salon','salon_id');
    }
}
