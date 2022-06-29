<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incomecategory extends Model
{
    protected $fillable = [
        'income_type','user_name',
    ];
}
