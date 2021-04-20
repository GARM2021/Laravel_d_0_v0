<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();               
            $table->float('amount')->unsigned();               
            $table->timestamp('payed_at')->nullable();
            $table->bigInteger('order_id')->unsigned(); // ! C56
         
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders'); // ! C56

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
