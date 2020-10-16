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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name');
            $table->string('code');
            $table->integer('quantity');
            $table->text('detail');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('price');
            $table->integer('sell_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->string('video')->nullable();

            $table->tinyInteger('main_slider')->default(0);
            $table->tinyInteger('hot_deal')->default(0);
            $table->tinyInteger('best_rated')->default(0);
            $table->tinyInteger('mid_slider')->default(0);
            $table->tinyInteger('hot_new')->default(0);
            $table->tinyInteger('trend')->default(0);

            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->tinyInteger('status')->default(1);

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
        Schema::dropIfExists('products');
    }
}
