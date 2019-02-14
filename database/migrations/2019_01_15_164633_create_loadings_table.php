<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('farm_id');
            $table->date('date');
            $table->string('hatchery_source');
            $table->unsignedInteger('total_delivered');
            $table->unsignedInteger('doa');
            $table->unsignedInteger('net_received');
            $table->string('truck_plate_no');
            $table->string('trucker_name');
            $table->time('dep_hatchery');
            $table->time('arr_farm');
            $table->time('dep_farm');
            $table->string('source_id');
            $table->string('seal_no');
            $table->text('notes');
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
        Schema::dropIfExists('loadings');
    }
}
