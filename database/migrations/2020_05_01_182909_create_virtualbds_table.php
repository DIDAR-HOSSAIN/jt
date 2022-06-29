<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtualbds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('income_id')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('virtualbds');
    }
}
