<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateRaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('raid');
        Schema::create('raid', function (Blueprint $table) {
            $table->string('gym_id')->unique()->index();
            $table->string('gym_name');
            $table->string('boss_name');
            $table->integer('raid_tier')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('start_time')->nullable();
            $table->timestamp('hatch_time')->nullable();
            $table->boolean('hatched')->nullable();
            $table->string('gym_location');
            $table->timestamp('recorded')->nullable();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('raid');
    }
}
