<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id');
            $table->string('product_img');
            $table->string('product_name');
            $table->text('short_description');
            $table->text('description');
            $table->string('price');
            $table->integer('rating');
            $table->integer('new_item');
            $table->integer('sorting_no');
            $table->string('promo');
            $table->string('gift_item');
            $table->string('promo_price');
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
        Schema::dropIfExists('products');
    }
}
