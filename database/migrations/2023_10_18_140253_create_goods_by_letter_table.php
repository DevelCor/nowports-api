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
        Schema::create('goods_by_letter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_instruction_card');
            $table->unsignedBigInteger('id_mercancia');
            $table->string('quantity');

            $table->foreign('id_instruction_card')->references('id')->on('instruction_cards');
            $table->foreign('id_mercancia')->references('id')->on('mercancias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_by_letter');
    }
};
