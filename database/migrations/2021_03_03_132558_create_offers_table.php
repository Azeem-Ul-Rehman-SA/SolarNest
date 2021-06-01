<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('partner_id')->unsigned()->index();
            $table->text('system_wattage')->nullable();
            $table->enum('net_metering', ['yes', 'no']);
            $table->enum('battery_system', ['yes', 'no']);
            $table->text('panel_model')->nullable();
            $table->text('panel_type')->nullable();
            $table->text('inverter_brand')->nullable();
            $table->text('battery_bank_type')->nullable();
            $table->bigInteger('batter_storage_capacity')->nullable(); //kwh
            $table->enum('smart_monitoring_application', ['yes', 'no']);
            $table->text('customer_support')->nullable(); //24/7
            $table->bigInteger('warranty_of_panel')->nullable(); //years
            $table->bigInteger('warranty_of_batteries')->nullable(); //years
            $table->bigInteger('warranty_of_inverter')->nullable(); //years
            $table->bigInteger('payback_period_in_years')->nullable(); //years
            $table->bigInteger('payback_period_in_months')->nullable(); //months
            $table->bigInteger('savings_for_ten_years')->nullable(); //pkr
            $table->enum('financing_options', ['yes', 'no']);
            $table->bigInteger('total_price_of_offering')->nullable(); //pkr
            $table->enum('status', ['active', 'inactive'])->nullable(); //pkr
            $table->text('city')->nullable();
            $table->text('region')->nullable();
            $table->longText('proposal_file')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
