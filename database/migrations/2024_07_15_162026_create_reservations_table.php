<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('space_id')->constrained('spaces');
            $table->dateTime('dt_from')->nullable();
            $table->dateTime('dt_to')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('days')->nullable();
            $table->integer('weeks')->nullable();
            $table->integer('months')->nullable();
            $table->enum('status', ['T', 'F'])->default('T');
            $table->string('ip')->nullable();
            $table->dateTime('created')->nullable();
            $table->dateTime('modified')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
