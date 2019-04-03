<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detail');
            $table->integer('satuan')->nullable();
            $table->double('bruto')->nullable();
            $table->unsignedInteger('parent')->nullable();
            $table->timestamps();

            $table->foreign('parent')
            ->references('id')->on('master')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uang');
    }
}
