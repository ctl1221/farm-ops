<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilityBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utility_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('utility');
            $table->date('period_start');
            $table->date('period_end');
            $table->double('amount');
            $table->unsignedInteger('supplier_id');
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
        Schema::dropIfExists('utility_bills');
    }
}
