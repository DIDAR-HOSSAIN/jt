<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('opening_date');
            $table->string('account_name');
            $table->string('account_no');
            $table->string('account_type');
            $table->integer('mobile_no');
            $table->string('customer_id_no');
            $table->string('finger_print');
            $table->string('nominee_name');
            $table->string('nominee_mobile_no');
            $table->string('relationship_with_account_holder');
            $table->integer('opening_deposit');
            $table->string('dps_no');
            $table->string('dps_amount_date');
            $table->string('fdr_No');
            $table->string('fdr_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
