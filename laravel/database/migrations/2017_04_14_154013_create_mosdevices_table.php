<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMosdevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosdevices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_number');
            $table->string('device_model');
            $table->string('electricity');
            $table->string('status');
            $table->string('maintenance_records');
            $table->Date('Maintenance_time');
            $table->string('location');
            $table->string('keeper');
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
        Schema::dropIfExists('mosdevices');
    }
}
