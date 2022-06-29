<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'father_name','mother_name','present_address','permanent_address','designation','joining_date',
        'basic','house_rent','medical_allowance','total_allowance',
    ];

    public function salary()
    {
     return $this->hasOne(Current_basic::class);
    }
}
