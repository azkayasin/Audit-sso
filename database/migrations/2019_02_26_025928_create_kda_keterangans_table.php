<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKdaKeterangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kda_keterangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kondisi');
            $table->string('kesimpulan');
            $table->string('saran');
            $table->string('rekomendasi');
            $table->string('tanggapan');
            $table->integer('kda_id');
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
        Schema::dropIfExists('kda_keterangan');
    }
}
