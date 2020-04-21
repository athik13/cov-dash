<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_cases', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('total')->nullable();
            $table->string('daily')->nullable();
            $table->string('dead')->nullable();
            $table->string('recovered')->nullable();
            $table->string('active')->nullable();
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
        Schema::dropIfExists('daily_cases');
    }
}
