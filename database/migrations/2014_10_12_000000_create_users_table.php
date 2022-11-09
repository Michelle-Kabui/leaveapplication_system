<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("department");
            $table->integer("av_days");
            $table->rememberToken();
            $table->timestamps();
            $table->string("username");
            $table->enum('role_as', ['0', '1', '2'])->default('0');
            $table->string("status")->default('active');
            $table->integer("tnumber")->nullable();
            $table->string("address")->nullable();
            $table->string("gender")->nullable();
            $table->string("nationality")->nullable();
            $table->integer("IDno")->nullable();
            $table->string("ename")->nullable();
            $table->integer("etnumber")->nullable();

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
};
