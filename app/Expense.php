<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'date', 'expense_type','payment_type', 'description','expense_amount','user_name',
    ];
}
