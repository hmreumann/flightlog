<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained('flights')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedDecimal('local_day_pilot', 10, 1)->nullable();
            $table->unsignedDecimal('local_day_copilot', 10, 1)->nullable();
            $table->unsignedDecimal('local_night_pilot', 10, 1)->nullable();
            $table->unsignedDecimal('local_night_copilot', 10, 1)->nullable();
            $table->unsignedDecimal('crossing_day_pilot', 10, 1)->nullable();
            $table->unsignedDecimal('crossing_day_copilot', 10, 1)->nullable();
            $table->unsignedDecimal('crossing_night_pilot', 10, 1)->nullable();
            $table->unsignedDecimal('crossing_night_copilot', 10, 1)->nullable();
            $table->unsignedDecimal('flight_instruction', 10, 1)->nullable();
            $table->unsignedDecimal('multi_engine', 10, 1)->nullable();
            $table->unsignedDecimal('jet', 10, 1)->nullable();
            $table->unsignedDecimal('turboprop', 10, 1)->nullable();
            $table->unsignedDecimal('aero_applicator', 10, 1)->nullable();
            $table->unsignedDecimal('instrumental_pilot', 10, 1)->nullable();
            $table->unsignedDecimal('instrumental_copilot', 10, 1)->nullable();
            $table->unsignedDecimal('instrumental_simulated', 10, 1)->nullable();
            $table->unsignedDecimal('simulator_instructor', 10, 1)->nullable();
            $table->unsignedDecimal('simulator_under_instruction', 10, 1)->nullable();
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
        Schema::dropIfExists('flight_times');
    }
}
