<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigInteger('id_product')->index();
            $table->bigInteger('id_order')->unsigned();
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');;
            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
