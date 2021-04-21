<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_categories', function (Blueprint $table) {
            $table->id();

            // $table->string('status')->nullable()->default('');
            $table->string('status')->nullable();
            $table->string('cat');
            // $table->uuid('cat_id')->default( Str::uuid() );
            $table->uuid('cat_id')->nullable();
            $table->string('cat_parent')->nullable();
            $table->string('cat_name')->nullable();
            $table->string('name')->nullable();

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
        Schema::dropIfExists('_categories');
    }
}
