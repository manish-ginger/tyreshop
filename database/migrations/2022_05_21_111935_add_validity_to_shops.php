<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValidityToShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->string('valdity', 10)->nullable()->after('password');
//            $table->dropColumn('working_days');
//            $table->dropColumn('working_time_from');
//            $table->dropColumn('working_time_to');
//            $table->dropColumn('featured_machines');
//            $table->dropColumn('desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
//            $table->dropColumn('valdity');
            $table->string('working_days');
            $table->string('working_time_from');
            $table->string('working_time_to');
            $table->string('featured_machines');
//            $table->longText('desc')->nullable();
        });
    }
}

