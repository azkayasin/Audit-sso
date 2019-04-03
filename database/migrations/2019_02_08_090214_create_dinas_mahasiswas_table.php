<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinasMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinas_mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_perjalanan');
            $table->string('uang_harian');
            $table->integer('biaya_penginapan');
            $table->integer('biaya_transport');
            $table->integer('parent');
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
        Schema::dropIfExists('dinas_mahasiswa');
    }
}
