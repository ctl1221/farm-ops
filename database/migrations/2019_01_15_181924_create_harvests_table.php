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

            $table->increments('id');
            $table->timestamps();

            //Required
            $table->string('control_no');
            $table->unsignedInteger('farm_id');
            $table->string('dressing_plant');
            $table->string('truck_plate_no');
            $table->date('date'); 
            $table->unsignedInteger('total_harvested');
            $table->integer('coops_per_truck');
            $table->float('alw_rate');

            //Semi Required
            $table->unsignedInteger('manager_id')->nullable();
            $table->unsignedInteger('good_harvested')->nullable();
            $table->unsignedInteger('rejected_harvested')->nullable();
            $table->double('kg_plant_gross_weight')->nullable();
            $table->double('kg_plant_tare_weight')->nullable();
            $table->double('kg_alw')->nullable();

            //Optionals
            $table->string('location')->nullable();
            $table->string('truck_no')->nullable();
            $table->string('trucker_name')->nullable();
            $table->string('truck_seal_no')->nullable();
            $table->integer('birds_per_coop')->nullable();
            
            $table->time('time_harvest_start')->nullable();
            $table->time('time_harvest_end')->nullable();
            $table->time('time_in_farm')->nullable();
            $table->time('time_out_farm')->nullable();
            $table->double('kg_tare_weight')->nullable();
            $table->double('kg_rejected_weight')->nullable();
            $table->unsignedInteger('pieces_for_processing')->nullable();
            $table->unsignedInteger('pieces_short')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedInteger('pieces_doa')->nullable();
            $table->double('kg_doa')->nullable();
            $table->string('plant_weigher')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('harvests');
    }
}
