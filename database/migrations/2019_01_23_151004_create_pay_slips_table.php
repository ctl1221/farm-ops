<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaySlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_slips', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('payroll_id');
            $table->unsignedInteger('employee_id');
            $table->double('amount');
            $table->string('reference');
            $table->unsignedInteger('days_absent');
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
        Schema::dropIfExists('pay_slips');
    }
}
