<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('status')->nullable()->default('');
            
            $table->string('company')->nullable()->default('');

            //address
            $table->string('street')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('state')->nullable()->default('');
            $table->string('zip')->nullable()->default('');
            $table->string('country')->nullable()->default('');
            $table->string('logo')->nullable()->default('');

            //site
            $table->string('site_id')->nullable()->default('');

            //misc
            // $table->json('_json')->nullable()->default('');
            $table->json('_json')->nullable();

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
        Schema::dropIfExists('_clients');
    }
}
