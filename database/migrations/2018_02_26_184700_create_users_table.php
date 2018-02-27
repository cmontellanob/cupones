<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('registration_date');
            $table->integer('promotional_reward_points');
            $table->integer('non_promotional_reward_points');
            $table->integer('membership_type_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("membership_type_id")
                ->references("id")
                ->on("membership_type")
                ->onDelete("RESTRICT");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
