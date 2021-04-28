<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // ! C58
    {
        // ! C62 se elimino el Archivo migration de Cart y se comentaron estas lineas
        // Schema::create('order_product', function (Blueprint $table) {//! C58 20210427
        //     $table->bigInteger('order_id')->unsigned();
        //     $table->bigInteger('product_id')->unsigned();
        //     $table->integer('quantity')->unsigned();

        //     $table->foreign('order_id')->references('id')->on('orders');
        //     $table->foreign('product_id')->references('id')->on('products');
        
        Schema::create('productables', function (Blueprint $table) {//! C62 20210428
            $table->bigInteger('product_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->morphs('productable');

            $table->foreign('product_id')->references('id')->on('products');    

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
