<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAircraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer',30);
            $table->string('model',30);
            $table->string('type_designator',30);
            $table->string('description',30);
            $table->string('engine_type',30);
            $table->unsignedSmallInteger('engine_count');
            $table->string('WTC',30);
            $table->string('registration',30);
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
        Schema::dropIfExists('aircraft');
    }
}
