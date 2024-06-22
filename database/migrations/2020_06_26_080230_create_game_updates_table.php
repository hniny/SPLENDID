<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('game_resource');
            $table->string('image');
            $table->integer('soon');
            $table->string('playform1');
            $table->string('playform2');
            $table->string('playform3');
            $table->string('genre');
            $table->text('description');
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
        Schema::dropIfExists('game_updates');
    }
}
