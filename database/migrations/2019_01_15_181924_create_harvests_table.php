<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvests', function (Blueprint $table) {
            //Form Importants
            $table->increments('id');
            $table->unsignedInteger('farm_id');
            $table->date('date');
            $table->string('truck_plate_no');
            $table->unsignedInteger('total_birds_harvested');
            // $table->unsignedInteger('total_good_birds');
            // $table->unsignedInteger('total_rejected_birds');
            // $table->unsignedInteger('receiving_plant_id');

            //Form Optionals
            $table->string('location')->nullable();
            $table->string('truck_no')->nullable();
            $table->integer('birds_per_coop')->nullable();
            $table->integer('coops_per_truck')->nullable();
            $table->time('time_in_farm')->nullable();
            $table->time('time_out_farm')->nullable();
            $table->time('time_harvest_start')->nullable();
            $table->time('time_harvest_end')->nullable();
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
        Schema::dropIfExists('harvests');
    }
}
