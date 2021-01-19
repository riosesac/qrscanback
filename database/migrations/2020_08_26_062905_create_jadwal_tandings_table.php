<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_tandings', function (Blueprint $table) {
            $table->id();
            $table->string('tglTanding');
            $table->string('jamTanding');
            $table->unsignedBigInteger('teamHome');
            $table->foreign('teamHome')->references('id')->on('info_teams')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('teamAway');
            $table->foreign('teamAway')->references('id')->on('info_teams')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('jadwal_tandings');
    }
}
