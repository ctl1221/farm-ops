<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_supplier')->default(false);
            $table->boolean('is_customer')->default(false);
            $table->boolean('is_chick_supplier')->default(false);
            $table->boolean('is_hatchery')->default(false);
            $table->boolean('is_dressing_plant')->default(false);
            $table->boolean('is_biller')->default(false);
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
        Schema::dropIfExists('companies');
    }
}
