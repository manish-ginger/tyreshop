<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cust_type');
            $table->date('dob');
            $table->string('mobile');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('qid');
            $table->string('wash_frequency');
            $table->string('before_days')->nullable();
            $table->string('content')->nullable();
            $table->bigInteger('notification_type')->default('1');
            $table->string('shop_id')->nullable;
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
        Schema::dropIfExists('customers');
    }
}
