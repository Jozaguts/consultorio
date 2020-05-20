<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');            
            $table->unsignedBigInteger('consulting_room_id');
            $table->foreign('consulting_room_id')->references('id')->on('consulting_rooms');

            $table->string('d')->nullable();
            $table->string('l')->nullable();
            $table->string('m')->nullable();
            $table->string('x')->nullable();
            $table->string('j')->nullable();
            $table->string('v')->nullable();
            $table->string('s')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('schedules');
    }
}
