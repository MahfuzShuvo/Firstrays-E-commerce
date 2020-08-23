<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmallBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('small_banners', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('title_3')->nullable();

            $table->string('path_1')->nullable();
            $table->string('path_2')->nullable();
            $table->string('path_3')->nullable();

            $table->string('size_1')->nullable();
            $table->string('size_2')->nullable();
            $table->string('size_3')->nullable();

            $table->string('url_1');
            $table->string('url_2');
            $table->string('url_3');

            $table->boolean('status')->default(0);

            $table->string('extension_1')->nullable();
            $table->string('extension_2')->nullable();
            $table->string('extension_3')->nullable();
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
        Schema::dropIfExists('small_banners');
    }
}
