<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTyreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('vehicle_tyres')) return;
        Schema::create('vehicle_tyres', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_category_id');
            $table->integer('vehicle_model_id');
            $table->integer('vehicle_brand_id');
            $table->integer('vehicle_variant_id');
            $table->string('vehicle_tyre_year');
            $table->string('image')->nullable();
            $table->string('shop_id');
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
        Schema::dropIfExists('vehicle_tyres');
    }
}
