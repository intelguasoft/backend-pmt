<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTollVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_toll_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 75);
            $table->decimal('cost', 11, 2);
            $table->string('description', 250);
            $table->string('prefix_car_plate', 5);
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
        Schema::dropIfExists('type_toll_vehicles');
    }
}
