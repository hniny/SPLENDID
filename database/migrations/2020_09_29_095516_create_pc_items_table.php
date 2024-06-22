<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->double('item_price');
            $table->unsignedInteger('pc_category_id');
            $table->foreign('pc_category_id')->references('id')->on('pc_categories')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('pc_items');
    }
}
