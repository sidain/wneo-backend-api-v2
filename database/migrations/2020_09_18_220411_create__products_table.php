<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_products', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('builder_id')->nullable()->default(1);
            $table->string('product_id')->nullable()->default(1);

            $table->string('status')->nullable()->default('');

            $table->string('name')->nullable()->default('');
            $table->string('product_name')->nullable()->default('');
            $table->string('part_number')->nullable()->default('');

            $table->string('image1')->nullable()->default('');
            $table->string('image1_thumb')->nullable()->default('');
            $table->string('image1_id')->nullable()->default('');

            /*
            $table->string('image2')->nullable()->default('');
            $table->string('image2_thumb')->nullable()->default('');

            $table->string('image3')->nullable()->default('');
            $table->string('image3_thumb')->nullable()->default('');
            */

            $table->string('alt_text')->nullable()->default('');
            $table->string('caption_text')->nullable()->default('');
            $table->string('description')->nullable()->default('');
            $table->string('excerpt_text')->nullable()->default('');
            $table->string('search_text')->nullable()->default('');

            // $table->string('category_id')->nullable()->default('');
            // $table->string('category_ids')->nullable()->default('');
            // $table->string('categorys')->nullable()->default('');
            $table->json('categorys_json')->nullable();

            $table->string('price_msrp')->nullable()->default('');
            $table->string('price_srp')->nullable()->default('');
            $table->string('price_other')->nullable()->default('');
            $table->json('price_json')->nullable();

            $table->string('data1')->nullable()->default('');
            $table->string('data2')->nullable()->default('');
            $table->string('data3')->nullable()->default('');
            $table->json('data_json')->nullable();

            $table->string('collection')->nullable()->default('');
            $table->string('collections')->nullable()->default('');
            $table->json('collections_json')->nullable();

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
        Schema::dropIfExists('_products');
    }
}
