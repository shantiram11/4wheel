<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rating');
            $table->integer('customer_service_rating')->nullable();
            $table->integer('quality_rating')->nullable();
            $table->integer('friendly_rating')->nullable();
            $table->integer('pricing_rating')->nullable();
            $table->enum('recommend', ['Yes', 'No'])->nullable();
            $table->enum('department', ['Sales', 'Service', 'Parts'])->nullable();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->boolean('approved')->default(0);
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
