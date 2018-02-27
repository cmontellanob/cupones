<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('base_price');
            $table->timestamp('create_date')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->char('in_active', 1);
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
        Schema::dropIfExists('product_pricing');
    }
}
