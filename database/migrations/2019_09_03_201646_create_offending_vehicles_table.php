<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffendingVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offending_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('car_plate', 10);
            $table->string('nit', 15)->nullable();

            $table->unsignedBigInteger('type_vehicle_id');
            $table->foreign('type_vehicle_id')->references('id')->on('type_vehicles');

            $table->unsignedBigInteger('mark_id');
            $table->foreign('mark_id')->references('id')->on('marks');

            $table->unsignedBigInteger('ballot_id');
            $table->foreign('ballot_id')->references('id')->on('ballots');

            $table->string('color_design', 250);
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
        Schema::dropIfExists('offending_vehicles');
    }
}
