<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_name');
            $table->string('orderID');
            $table->string('user_phone');
            $table->string('user_email');
            $table->string('shipping_address');
            $table->string('division');
            $table->string('district');
            $table->string('zone');
            $table->string('postal_code');
            $table->integer('shipping_charge');
            $table->string('coupon_code')->nullable();
            $table->integer('coupon_amount')->nullable();
            $table->integer('grand_total');
            $table->string('payment_method');
            $table->unsignedTinyInteger('order_status')->comment('1 = confirm, 2 = sent to shipping, 3 = recieved by customer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
