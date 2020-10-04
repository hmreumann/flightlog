<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('local',3);
            $table->string('oaci',4)->nullable();
            $table->string('iata',3)->nullable();
            $table->string('tipo',10);
            $table->string('denominacion',63);
            $table->string('coordenadas',22);
            $table->decimal('latitud', 12, 8);
            $table->decimal('longitud', 12, 8);
            $table->decimal('elev', 7, 2);
            $table->string('uom_elev', 6);
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
        Schema::dropIfExists('airports');
    }
}
