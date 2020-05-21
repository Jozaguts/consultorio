<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->decimal('age',4,2);
            $table->decimal('height',3,2);
            $table->string('address');
            $table->string('phone');
            $table->string('contact');
            $table->string('contact_phone');
            $table->unsignedBigInteger('consulting_room_id');
            $table->foreign('consulting_room_id')->references('id')->on('consulting_rooms');
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
        Schema::dropIfExists('patients');
    }
}
