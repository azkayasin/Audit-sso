<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKdasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kda', function (Blueprint $table) {
            $table->increments('id_kda');
            $table->string('unit');
            $table->date('masa_audit');
            $table->date('bulan_audit');
            $table->integer('jenis');
            $table->string('kode_temuan')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('kda');
    }
}
