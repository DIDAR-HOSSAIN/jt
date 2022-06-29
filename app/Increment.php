<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Increment extends Model
{
    protected $fillable = [
        'employee_id','increment', 'current_basic',
    ];

    public function current_basic()
    {
        return $this->hasOne(Current_basic::class);
    }
}
