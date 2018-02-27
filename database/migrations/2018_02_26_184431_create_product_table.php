<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',100);
            $table->string('product_description',4000);
            $table->integer('units_in_stock');
            $table->integer('product_category_id')->unsigned();
            $table->integer('reward_points_credit');
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
        Schema::dropIfExists('product');
    }
}
