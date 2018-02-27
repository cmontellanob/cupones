<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRewardPointLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reward_point_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('reward_points');
            $table->char('reward_type',2);
            $table->char('operation_type',1);
            $table->timestamp('create_date'); 
            $table->date('expiry_date')->nullable();    
            $table->foreign("user_id")
                ->references("id")
                ->on("user")
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
        Schema::dropIfExists('user_reward_point_log');
    }
}
