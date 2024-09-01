<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('register_user');
        Schema::create('register_user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('fname',100);
            $table->string('lname',100);
            $table->integer('rno');
            $table->string('fathername',100);
            $table->string('mothername',100);
            $table->enum('gender',['male','female']);
            $table->string('phonenumber',15);
            $table->binary('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_user');
    }
};
