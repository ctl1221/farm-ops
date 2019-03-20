<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('farm_id');
            $table->float('pct_hr');
            $table->float('fcr');
            $table->float('alw');
            $table->float('bpi');
            $table->float('age');
            $table->unsignedInteger('gross_birds_received');
            $table->unsignedInteger('birds_adjustment');
            $table->unsignedInteger('net_birds_received');
            $table->unsignedInteger('birds_harvested');
            $table->float('gross_weight');
            $table->float('staging_adjustment');
            $table->float('net_weight');
            $table->float('feed_in_crop');
            $table->string('IBFP');
            $table->string('IBGP');
            $table->string('IBSC');
            $table->string('ICBC');
            $table->double('alw_fee');
            $table->float('fcr_rate');
            $table->float('hr_rate');
            $table->float('bpi_rate');
            $table->float('fcri_rate');
            $table->float('class_a_fee');
            $table->float('growing_defectives_rate');
            $table->float('hauling_defectives_rate');
            $table->float('lpg_rate');
            $table->float('incentive_1_rate');
            $table->float('incentive_2_rate');
            $table->float('power_subsidy');
            $table->float('vetmed_disinfectant_rebate');
            $table->double('total_growers_fee');
            $table->float('dob_vaccination');
            $table->float('depletion');
            $table->float('fly_charges_rate');
            $table->double('total_chargeable');
            $table->double('net_growers_fee');
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
        Schema::dropIfExists('sales');
    }
}
