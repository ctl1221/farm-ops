<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingFarm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_farm', function (Blueprint $table) {
            $table->unsignedInteger('building_id');
            $table->unsignedInteger('farm_id');
            $table->unsignedInteger('birds_started')->default(0);
            $table->unsignedInteger('manager_id')->nullable();
            $table->unsignedInteger('supervisor_id')->nullable();
            $table->unsignedInteger('caretaker_id')->nullable();
            $table->index(['building_id','farm_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_farm');
    }
}
