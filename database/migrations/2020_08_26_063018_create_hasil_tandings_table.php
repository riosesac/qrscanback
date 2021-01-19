<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_tandings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tanding');
            $table->foreign('tanding')->references('id')->on('jadwal_tandings')->onUpdate('cascade')->onDelete('restrict');
            $table->string('goal');
            $table->unsignedBigInteger('pemain');
            $table->foreign('pemain')->references('id')->on('info_pemains')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_tandings');
    }
}
