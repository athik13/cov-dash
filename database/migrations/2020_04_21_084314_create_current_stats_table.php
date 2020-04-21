<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('totalConfirmedCases')->default('0');
            $table->integer('recovered')->default('0');
            $table->integer('active')->default('0');
            $table->integer('deaths')->default('0');

            $table->integer('people_tested_positive')->default('0');
            $table->integer('people_tested_negative')->default('0');
            $table->integer('people_tested_pending')->default('0');

            $table->integer('locals')->default('0');
            $table->integer('foreigners')->default('0');

            $table->integer('active_in_maldives')->default('0');
            $table->integer('active_out_of_country')->default('0');

            $table->integer('isolation')->default('0');
            $table->integer('quarantine')->default('0');

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
        Schema::dropIfExists('current_stats');
    }
}
