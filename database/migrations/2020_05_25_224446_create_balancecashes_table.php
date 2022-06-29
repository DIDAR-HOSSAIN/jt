<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancecashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balancecashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('income_id')->nullable();
            $table->float('cash_in')->nullable();
            $table->float('cash_out')->nullable();
            $table->timestamps();

            $table->foreign('income_id')->references('id')->on('incomes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balancecashes');
    }
}
