<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('discount_value');
            $table->string('discount_unit' ,20);
            $table->timestamp('create_date')->nullable(); 
            $table->timestamp('valid_from')->nullable(); 
            $table->timestamp('valid_until')->nullable();
            $table->string('coupon_code',10);
            $table->integer('minimum_order_value');
            $table->integer('maximum_discount_amount');
            $table->char('is_redeem_allowed');
            $table->foreign("product_id")
                ->references("id")
                ->on("product")
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
        Schema::dropIfExists('product_discount');
    }
}
