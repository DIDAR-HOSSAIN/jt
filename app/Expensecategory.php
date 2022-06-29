<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expensecategory extends Model
{
    protected $fillable = [
        'expense_type','user_name',
    ];
}
