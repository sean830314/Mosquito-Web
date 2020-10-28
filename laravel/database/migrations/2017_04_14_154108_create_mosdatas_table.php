<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMosdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data_device_number');
            $table->integer('count');
            $table->double('fea_value');
            $table->string('species');
            $table->integer('in_time');
            $table->integer('delay_time');
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
        Schema::dropIfExists('mosdatas');
    }
}
