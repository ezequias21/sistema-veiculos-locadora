<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {

            //Main data
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->string('renavam', 11);
            $table->string('license_plate', 8);
            $table->unsignedInteger('model');
            $table->unsignedInteger('brand');
            $table->unsignedInteger('category');
            $table->string('color', 20);
            $table->string('fuel', 20)->nullable();
            $table->integer('year')->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->decimal('rental_price', 8, 2)->nullable();
            $table->text('description')->nullable();
            
            //Details
            $table->boolean('native_wifi')->default(false);
            $table->boolean('emergency_branking_system')->default(false);
            $table->boolean('easy_park')->default(false);
            $table->boolean('sunroof')->default(false);
            $table->boolean('reversing_camera')->default(false);
            $table->boolean('stability_and_traction_system')->default(false);
            $table->boolean('remote_start')->default(false);
            $table->boolean('air_bag')->default(false);
            $table->boolean('eletric_windowscreen')->default(false);
            $table->boolean('air_conditioner')->default(false);
            $table->boolean('eletric_lock')->default(false);
            $table->boolean('hydraulic_steering')->default(false);
            $table->boolean('abs')->default(false);
            
            //Status
            $table->enum('status', ['available', 'unavailable', 'rented', 'sold']);
            
            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('brand')->references('id')->on('brands')->onDelete('CASCADE');
            $table->foreign('category')->references('id')->on('categories')->onDelete('CASCADE');
            $table->foreign('model')->references('id')->on('model_cars')->onDelete('CASCADE');
           
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
        Schema::dropIfExists('vehicles');
    }
}
