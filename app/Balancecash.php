<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balancecash extends Model
{
    protected $fillable = [
        'income_id','cash_in', 'cash_out','user_name',
    ];

    public function income ()
    {
        return $this->belongsTo(Income::class);
    }
}
