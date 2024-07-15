<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpacesTable extends Migration
{
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();
            $table->integer('min_reservation_length')->nullable();
            $table->enum('min_reservation_length_unit', ['minutes', 'hours', 'days'])->nullable();
            $table->integer('max_reservation_length')->nullable();
            $table->enum('max_reservation_length_unit', ['minutes', 'hours', 'days'])->nullable();
            $table->integer('reservation_length_limit')->nullable();
            $table->enum('reservation_length_limit_unit', ['minutes', 'hours', 'days'])->nullable();
            $table->enum('reservation_length_limit_per', ['user', 'resource'])->nullable();
            $table->integer('cancel_before')->nullable();
            $table->enum('cancel_before_per', ['minutes', 'hours', 'days'])->nullable();
            $table->enum('make_reservations_public', ['T', 'F'])->default('T');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spaces');
    }
}
