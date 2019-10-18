<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaidBossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raid_bosses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tier');
            $table->string('form');
            $table->integer('pokemon_id');
            $table->string('pokemon_name');
            $table->boolean('shiny');
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
        Schema::dropIfExists('raid_bosses');
    }
}
