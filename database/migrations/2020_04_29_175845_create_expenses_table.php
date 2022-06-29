<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_expense_summary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('expense_type');
            $table->string('payment_type');
            $table->string('description');
            $table->float('expense_amount');
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
        Schema::dropIfExists('detail_expense_summary');
    }
}
