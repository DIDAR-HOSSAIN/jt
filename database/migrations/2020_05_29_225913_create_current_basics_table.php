<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_basics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->float('current_basic');
            $table->timestamps();
//            $table->foreign('employee_id')->references('id')->on('increments')->onDelete('cascade');
//            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
//            $table->foreign('employee_id')->references('id')->on('employee_salaries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_basics');
    }
}
