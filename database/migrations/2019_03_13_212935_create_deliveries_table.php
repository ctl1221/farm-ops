<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //Required
            $table->unsignedInteger('harvest_id');
            $table->char('shift');
            $table->time('time_in_plant');
            $table->time('time_weighed_plant');
            $table->double('kg_plant_net_weight');
            $table->double('kg_plant_feeds_in_crop');
            $table->double('kg_adjusted_net_weight');
            $table->double('alw_rate');
        });
    }
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
