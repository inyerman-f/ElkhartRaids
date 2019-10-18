<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('quest');
        Schema::create('quest', function (Blueprint $table) {
            $table->string('pokestop_id')->unique()->index();
            $table->string('pokestop_name');
            $table->string('reward');
            $table->string('task')->nullable();
            $table->string('entered_by')->nullable();
            $table->timestamp('recorded');
            $table->string('stop_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quest');
    }
}

