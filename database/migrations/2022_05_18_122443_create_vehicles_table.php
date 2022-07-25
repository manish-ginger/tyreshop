<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_category_id')->nullable();
            $table->integer('vehicle_model_id')->nullable();
            $table->integer('vehicle_brand_id')->nullable();
            $table->string('variant')->nullable();
            $table->string('width')->nullable();
            $table->string('ratio')->nullable();
            $table->string('construcion')->nullable();
            $table->string('diameter')->nullable();
            $table->string('loadrating')->nullable();
            $table->string('speed')->nullable();
            $table->string('image')->nullable();
            $table->string('shop_id')->nullable();
            $table->string('approved')->default(0);
            $table->longText('desc')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
