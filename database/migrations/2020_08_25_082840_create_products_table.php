<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sku');
            $table->integer('brand_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('price');
            $table->integer('purchase');
            $table->integer('promotion_price')->nullable();
            $table->date('starting_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('quantity');
            $table->integer('alert_quantity');
            $table->text('description');
            $table->string('slug');
            $table->boolean('status')->default(0);
            $table->boolean('isFeatured')->default(0);
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
        Schema::dropIfExists('products');
    }
}
