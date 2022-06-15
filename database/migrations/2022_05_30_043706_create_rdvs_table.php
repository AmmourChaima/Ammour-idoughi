<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->integer('polyclinique_id');
            $table->integer('user_id');
            $table->integer('vaccin_id')->nullable();
            $table->date('first_shot')->nullable();
            $table->date('second_shot')->nullable();
            $table->boolean('extended')->nullable();
            $table->boolean('confirmed')->nullable();
            $table->boolean('reported')->nullable();
            $table->string('qr_id')->nullable();
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
        Schema::dropIfExists('rdvs');
    }
}
