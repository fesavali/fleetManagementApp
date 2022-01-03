<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_registration_number')->unique();
            $table->string('client_details');
            $table->string('vehicle_make');
            $table->string('vehicle_model');
            $table->string('chassis_number')->unique();
            $table->string('engine_number')->unique();
            $table->string('color');
            $table->string('serial');
            $table->longText('other_interest');
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
        Schema::dropIfExists('vehicles');
    }
}
