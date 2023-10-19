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
        Schema::create('instruction_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sender_user')->nullable(); // relacionado con la tabla usuarios
            $table->unsignedBigInteger('id_receiver_user')->nullable(); // relacionado con la tabla usuarios
            $table->string('emission_date');
            $table->string('reception_date');
            $table->string('state');
            $table->timestamps();

            $table->foreign('id_sender_user')->references('id')->on('users');
            $table->foreign('id_receiver_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruction_cards');
    }
};
