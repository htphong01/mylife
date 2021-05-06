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
        Schema::create('user_infors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('dateOfBirth')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('education')->nullable();
            $table->string('work')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->integer('relationship')->nullable();
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
