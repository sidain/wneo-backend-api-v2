<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_options', function (Blueprint $table) {
            $table->id();

            $table->string('status')->nullable()->default('');

            $table->string('user_id');

            $table->string('section');
            $table->string('subsection');

            $table->string('name');
            $table->string('value');

            $table->string('notes');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_options');
    }
}
