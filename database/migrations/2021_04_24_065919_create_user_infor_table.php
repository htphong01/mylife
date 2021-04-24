<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInforTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('dateOfBirth')->default(null);
            $table->integer('gender')->default('1');
            $table->string('address')->default(null);
            $table->string('education')->default(null);
            $table->string('work')->default(null);
            $table->string('phoneNumber')->default(null);
            $table->integer('relationship')->default(null);
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
        Schema::dropIfExists('user_infor');
    }
}
