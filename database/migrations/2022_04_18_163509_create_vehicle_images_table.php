<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_images', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vehicle');
            $table->string('path');
            $table->string('cover')->nullable();
            $table->timestamps();

            $table->foreign('vehicle')->references('id')->on('vehicles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_images');
    }
}
