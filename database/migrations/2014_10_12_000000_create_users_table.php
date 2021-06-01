<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('cnic')->nullable();
            $table->text('address')->nullable();
            $table->text('company_name')->nullable();
            $table->longText('description')->nullable();
            $table->string('otp_code')->nullable();
            $table->string('profile_pic')->default('default.png');
            $table->string('logo')->default('default.png');
            $table->enum('user_type', ['admin', 'partner', 'customer'])->nullable();
            $table->enum('status', ['pending', 'suspended', 'verified'])->default('pending');
            $table->enum('otp_status', ['sent', 'verified'])->default('sent');
            $table->timestamp('email_verified_at')->nullable();
//            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
