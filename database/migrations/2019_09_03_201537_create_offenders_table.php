<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 75);
            $table->string('last_name', 150);
            $table->string('driver_license', 25);
            $table->string('license_class', 25);
            $table->string('dpi', 13);
            $table->string('home_address', 250);
            $table->string('state', 75);
            $table->string('city', 75);

            $table->unsignedBigInteger('ballot_id');
            $table->foreign('ballot_id')->references('id')->on('ballots');

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
        Schema::dropIfExists('offenders');
    }
}
