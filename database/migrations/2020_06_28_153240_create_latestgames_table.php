<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatestgamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latestgames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('bg_image');
            $table->string('desp');
            $table->integer('price');
            $table->string('spec1');
            $table->text('spec1_desp');
            $table->string('spec2');
            $table->text('spec2_desp');
            $table->string('spec3');
            $table->text('spec3_desp');
            $table->string('spec4');
            $table->text('spec4_desp');
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
        Schema::dropIfExists('latestgames');
    }
}
