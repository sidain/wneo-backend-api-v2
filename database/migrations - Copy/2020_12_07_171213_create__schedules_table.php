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
        Schema::create('_schedules', function (Blueprint $table) {
            $table->id();

            $table->string('status')->nullable();
            $table->string('what')->nullable();
            $table->string('how')->nullable();
            $table->string('last')->nullable();
            $table->string('frequency')->nullable();
            $table->string('errors')->nullable();

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
        Schema::dropIfExists('_schedules');
    }
}
