<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Virtualcash extends Model
{
    protected $fillable = [
        'income_id','date','cash_in', 'cash_out','user_name',
    ];

    public function income ()
    {
        return $this->belongsTo(Income::class);
    }
}
