<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('partner_id');
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('order_id');
            $table->string('name');
            $table->integer('quality_of_work');
            $table->integer('professionalism');
            $table->integer('quality_of_material');
            $table->integer('on_time_delivery');
            $table->integer('overall_experience');
            $table->float('overall_rating');
            $table->longText('comments');
            $table->longText('suggestion')->nullable();
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
        Schema::dropIfExists('ratings');
    }
}
