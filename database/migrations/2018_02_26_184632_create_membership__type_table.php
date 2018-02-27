<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('membership_type',20);
            $table->integer('discount_value');
            $table->string('discount_unit',20);
            $table->date('create_date');
            $table->date('valid_until'); 
            $table->char('is_free_shipping_active',1); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_type');
    }
}
