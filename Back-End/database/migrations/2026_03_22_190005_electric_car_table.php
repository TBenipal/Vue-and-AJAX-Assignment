<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ElectricCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Created/Updated columns for the table
        Schema::create('electric_cars', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->string('fuel');
            $table->integer('fuel_capacity');
            $table->decimal('price');
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
        //Drop the table if needed
        Schema::dropIfExists('electric_cars');
    }
}
