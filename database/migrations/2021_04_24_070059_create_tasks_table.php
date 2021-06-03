<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creater_id');  
            $table->integer('receiver_id');
            $table->integer('room_id');
            $table->string('content');
            $table->datetime('deadline');
            $table->string('note');
            $table->string('file');
            $table->integer('isSubmitted')->default('1');
            $table->datetime('submitted_at');
            $table->integer('isCompleted')->default('1');
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
        Schema::dropIfExists('tasks');
    }
}
