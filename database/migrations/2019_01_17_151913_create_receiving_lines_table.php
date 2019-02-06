<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('receiving_id');
            $table->morphs('material');
            $table->unsignedInteger('quantity');
            $table->string('batch_no');
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
        Schema::dropIfExists('receiving_lines');
    }
}
