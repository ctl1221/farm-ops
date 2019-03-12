<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadingsTable extends Migration
{
    public function up()
    {
        Schema::create('loadings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //Required
            $table->unsignedInteger('farm_id');
            $table->unsignedInteger('company_id');
            $table->date('date_dep_hatchery');
            $table->string('truck_plate_no');
            $table->string('hatchery_source');
            $table->unsignedInteger('total_delivered');
            $table->unsignedInteger('doa_delivered');

            //Aggregates
            $table->unsignedInteger('net_delivered');

            //Semi Required
            $table->time('time_arr_farm')->nullable();

            //Optionals
            $table->string('batch_no')->nullable();
            $table->string('location')->nullable();
            $table->string('trucker_name')->nullable();
            $table->time('time_dep_hatchery')->nullable();
            $table->time('time_dep_farm')->nullable();
            $table->time('time_arr_hatchery')->nullable();
            $table->string('source_id')->nullable();
            $table->string('seal_no')->nullable();
            $table->text('vaccines')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->unsignedInteger('aps_id')->nullable();
            $table->unsignedInteger('manager_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loadings');
    }
}
