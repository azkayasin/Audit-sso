<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKdaDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kda_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kda_id');
            $table->boolean('item1')->nullable();
            $table->integer('item1_jum')->nullable();
            $table->double('item1_nom')->nullable();
            $table->boolean('item2')->nullable();
            $table->integer('item2_jum')->nullable();
            $table->double('item2_nom')->nullable();
            $table->boolean('item3')->nullable();
            $table->integer('item3_jum')->nullable();
            $table->double('item3_nom')->nullable();
            $table->boolean('item4')->nullable();
            $table->integer('item4_jum')->nullable();
            $table->double('item4_nom')->nullable();
            $table->boolean('item5')->nullable();
            $table->integer('item5_jum')->nullable();
            $table->double('item5_nom')->nullable();
            $table->boolean('item6')->nullable();
            $table->integer('item6_jum')->nullable();
            $table->double('item6_nom')->nullable();
            $table->boolean('item7')->nullable();
            $table->integer('item7_jum')->nullable();
            $table->double('item7_nom')->nullable();
            $table->boolean('item8')->nullable();
            $table->integer('item8_jum')->nullable();
            $table->double('item8_nom')->nullable();
            $table->boolean('item9')->nullable();
            $table->integer('item9_jum')->nullable();
            $table->double('item9_nom')->nullable();
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
        Schema::dropIfExists('kda_data');
    }
}
