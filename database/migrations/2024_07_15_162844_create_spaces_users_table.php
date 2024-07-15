<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpacesUsersTable extends Migration
{
    public function up()
    {
        Schema::create('spaces_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('space_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('space_id')->references('id')->on('spaces')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['space_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('spaces_users');
    }
}
