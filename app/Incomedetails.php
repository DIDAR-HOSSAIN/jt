<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incomedetails extends Model
{
    protected $fillable = [
        'income_id', 'income_type','received_type','amount',
    ];

    public function income (){
        return $this->belongsTo(Income::class);
    }
}

