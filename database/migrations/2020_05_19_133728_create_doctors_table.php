<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('consulting_room_id');
            $table->foreign('consulting_room_id')->references('id')->on('consulting_rooms');            
            $table->unsignedBigInteger('specialtie_id');
            $table->foreign('specialtie_id')->references('id')->on('specialties');   

            $table->string('phone');
            $table->string('mobile_phone');
            $table->string('whatsapp');
            $table->string('address');
            $table->string('identification_card');
            $table->string('birth_date');
            $table->string('studies');
            $table->text('observations');            

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
        Schema::dropIfExists('doctors');
    }
}
