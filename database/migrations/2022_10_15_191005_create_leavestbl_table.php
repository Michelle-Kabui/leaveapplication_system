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
        Schema::create('leavestbl', function (Blueprint $table) {
            $table->id();
            $table->integer("userID");
            $table->string("leavetype");
            $table->date("ToDate");
            $table->date("FromDate");
            $table->string("Description");
            $table->string("Status");
            $table->string("AdminRemarks");
            $table->integer("numDays");
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
        Schema::dropIfExists('leavestbl');
    }
};
