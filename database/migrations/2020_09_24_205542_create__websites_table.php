<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_websites', function (Blueprint $table) {
            $table->id();

            $table->string('status')->nullable()->default('');

            $table->string('url');
            $table->string('wneo_id');
            $table->string('wneo_products');
            $table->string('wneo_builders');
            $table->string('site_created');
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
        Schema::dropIfExists('_websites');
    }
}
