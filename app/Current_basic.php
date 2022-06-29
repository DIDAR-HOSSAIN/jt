<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Current_basic extends Model
{
    protected $fillable = [
        'employee_id','current_basic',
    ];

//    public function increment()
//    {
//        return $this->belongsTo(Increment::class);
//    }
//
//    public function employee_salaries ()
//    {
//        return $this->hasMany(Employee_Salary::class);
//    }
}
