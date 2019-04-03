<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinasLuarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinas_luar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('negara');
            $table->integer('satuan')->nullable();
            $table->integer('a')->nullable();
            $table->integer('b')->nullable();
            $table->integer('c')->nullable();
            $table->integer('d')->nullable();
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
        Schema::dropIfExists('dinas_luar');
    }
}
