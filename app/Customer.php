<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'opening_date', 'account_name','account_no','account_type','mobile_no','customer_id_no','finger_print',
        'nominee_name','nominee_mobile_no','relationship_with_account_holder','opening_deposit','dps_no','dps_amount_date',
        'fdr_No','fdr_amount','user_name',
    ];
}
