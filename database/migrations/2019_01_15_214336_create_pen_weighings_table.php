<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenWeighingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pen_weighings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('weighing_id');
            $table->unsignedInteger('pen_id');
            $table->float('weight', 4, 3)->default(0.0);
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
        Schema::dropIfExists('pen_weighings');
    }
}
