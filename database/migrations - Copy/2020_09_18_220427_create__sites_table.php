<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_sites', function (Blueprint $table) {
            $table->id();

            $table->string('url')->nullable();
            $table->string('uri')->nullable();

            $table->string('status')->nullable();

            $table->string('theme')->nullable();
            $table->string('plugins')->nullable();
            $table->string('wneo_plugins')->nullable();

            $table->integer('client_id')->nullable();
            $table->string('builder_ids')->nullable();

            $table->string('sc_version')->nullable();
            $table->string('wp_version')->nullable();

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
        Schema::dropIfExists('_sites');
    }
}
