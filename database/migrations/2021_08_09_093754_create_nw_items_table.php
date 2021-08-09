<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNwItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nw_professions', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('profession')->unique();
        });

        Schema::create('nw_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('img')->default('https://online.forda.ru/img/square.gif');
            $table->integer('tier')->nullable();
            $table->boolean('is_craftable');
            $table->integer('profession_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('profession_id')->references('id')->on('nw_professions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nw_items');
        Schema::dropIfExists('nw_professions');
    }
}
