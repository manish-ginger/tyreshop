<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopdetails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shop_id');
            $table->string('licence');
            $table->string('location')->nullable();
            $table->string('contact')->nullable();
            $table->string('owner')->nullable();
            $table->string('whatsapp')->nullable();
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
        Schema::dropIfExists('shopdetails');
    }
}
