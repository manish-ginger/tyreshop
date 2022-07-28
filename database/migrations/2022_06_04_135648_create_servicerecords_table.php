<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicerecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicerecords', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number')->nullable();
            $table->bigInteger('status')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('service_id')->nullable();
            $table->bigInteger('booking_type')->default(0);
            $table->string('curr_odo_reading')->nullable();
            $table->string('next_odo_reading')->nullable();
            $table->bigInteger('shop_id')->nullable();
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
        Schema::dropIfExists('servicerecords');
    }
}
