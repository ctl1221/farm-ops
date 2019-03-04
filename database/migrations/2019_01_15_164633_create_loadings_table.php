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
            $table->string('truck_plate_no')->nullable();
            $table->string('trucker_name')->nullable();
            $table->time('dep_hatchery');
            $table->time('arr_farm');
            $table->time('dep_farm')->nullable();
            $table->string('source_id')->nullable();
            $table->string('seal_no')->nullable();
            $table->text('notes')->nullable();
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
