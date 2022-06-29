<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_Salary extends Model
{
    protected $fillable = [
        'salary_id', 'employee_id','basic','total_present','deduct','vat','provident_Fund',
        'net_payable',
    ];

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
