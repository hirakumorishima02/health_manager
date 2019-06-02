<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('event_day');
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->timestamps();
            
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            
            $table
            ->foreign('event_id')
            ->references('id')
            ->on('events')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icons');
    }
}
