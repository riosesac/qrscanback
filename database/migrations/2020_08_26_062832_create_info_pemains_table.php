<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPemainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_pemains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTeam');
            $table->foreign('idTeam')->references('id')->on('info_teams')->onUpdate('cascade')->onDelete('restrict');
            $table->string('nama');
            $table->string('tinggiBadan');
            $table->string('beratBadan');
            $table->enum('posisi', ['penyerang', 'gelandang', 'bertahan', 'penjagagawang']);
            $table->string('nomorPunggung');
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
        Schema::dropIfExists('info_pemains');
    }
}
