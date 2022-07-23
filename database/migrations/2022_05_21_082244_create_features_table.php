<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('feature_name')->nullable;
            $table->string('vehicle_category')->nullable;
            $table->string('brand')->nullable;
            $table->string('model')->nullable;
//            $table->string('variant')->nullable;
            $table->string('actual_price')->nullable;
            $table->string('discounted_price')->nullable;
            $table->string('perc_or_amount')->nullable;
            $table->string('gift_card')->nullable;
            $table->string('coupon')->nullable;
            $table->string('accessory')->nullable;
//            $table->string('free_services')->nullable;
            $table->string('duration')->nullable;
            $table->string('shop_id')->nullable;
            $table->string('loyalty_points')->nullable;
            $table->string('loyalty_points_validity')->nullable;
            $table->string('slots')->nullable;
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
        Schema::dropIfExists('features');
    }
}
