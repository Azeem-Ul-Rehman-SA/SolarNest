<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->text('author_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('description')->nullable();
            $table->enum('is_featured', ['yes', 'no'])->default('no');
            $table->integer('is_order')->default(0);
            $table->string('image')->default('default.png');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keywords')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
