<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'date', 'income_type','commission','received_type', 'income_amount','description','user_name',
    ];

    public function incomedetails ()
    {
    return $this->hasMany(Incomedetails::class);
    }

//    Bank
        public function virtualbd ()
        {
            return $this->hasOne(Virtualbd::class);
        }

        public function balancebd ()
        {
            return $this->hasOne(Balancebd::class);
        }

//        Rocket

        public function rocket ()
        {
            return $this->hasOne(Rocket::class);
        }

        public function virtualcash ()
        {
        return $this->hasOne(Virtualcash::class);
        }

        public function balancecash ()
        {
        return $this->hasOne(Balancecash::class);
        }

}

