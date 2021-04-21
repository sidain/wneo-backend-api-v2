<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_images', function (Blueprint $table) {
            $table->id();

            $table->string('status')->nullable()->default('');

            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();

            $table->string('image_id')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_type')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_url')->nullable();
            $table->string('image_source')->nullable();
            $table->string('image_extension')->nullable();

            $table->string('image_builder_id')->nullable();
            $table->string('image_product_id')->nullable();

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
        Schema::dropIfExists('_images');
    }
}
