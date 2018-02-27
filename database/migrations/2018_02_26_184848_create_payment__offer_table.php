<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_offer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institute_type',50);
            $table->string('institute_name',200);
            $table->string('card_type',20)->nullable();
            $table->string('coupon_code',10);
            $table->integer('discount_value number');
            $table->string('discount_unit',20);
            $table->timestamp('create_date')->nullable(); 
            $table->timestamp('valid_from')->nullable(); 
            $table->timestamp('valid_until')->nullable(); 
            $table->integer('maximum_discount_amount');
            $table->integer('product_id')->nullable()->unsigned();
            $table->integer('product_category_id')->nullable()->unsigned();
            $table->foreign("product_id")
                ->references("id")
                ->on("product")
                ->onDelete("RESTRICT");
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
        Schema::dropIfExists('payment_offer');
    }
}
