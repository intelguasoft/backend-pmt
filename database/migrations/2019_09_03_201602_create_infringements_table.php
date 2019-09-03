<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfringementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infringements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('time');
            $table->string('place', 150);
            $table->string('infringement_summary', 500);
            $table->string('law_basics', 250);
            $table->string('traffic_regulations', 500);
            $table->decimal('total', 11, 2);

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
        Schema::dropIfExists('infringements');
    }
}
