<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_category_id')->unsigned();
            $table->integer('discount_value');
            $table->string('discount_unit',20);
            $table->timestamp('create_date')->nullable();
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->string('coupon_code',20);
            $table->integer('minimum_order_value');
            $table->integer('maximum_discount_amount');
            $table->char('is_redeem_allowed',1);
            $table->foreign("product_category_id")
                ->references("id")
                ->on("product_category")
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
        Schema::dropIfExists('product_category_discount');
        
        
    }
}
