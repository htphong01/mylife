<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_receivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('creater_id');
            $table->integer('receiver_id');
            $table->string('content');
            $table->datetime('deadline');
            $table->integer('isSubmitted')->default('1');
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
        Schema::dropIfExists('task_receivers');
    }
}
