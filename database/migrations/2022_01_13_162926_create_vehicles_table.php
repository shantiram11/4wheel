<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('company_name');
            $table->string('fuel_type');
            $table->string('vehicle_number');
            $table->string('brand');
            $table->string('seat_count');
            $table->string('description')->nullable();
            $table->string('location');
            $table->enum('vehicle_type',['car','Motorbike','Jeep'])->default('car');
            $table->string('rate');
            $table->string('model');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
