<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'month','year', 'working_days',
    ];
    public function employee_salaries ()
    {
        return $this->hasMany(Employee_Salary::class);
    }
}
