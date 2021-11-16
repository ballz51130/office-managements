<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsAptitudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrtations_aptitude', function (Blueprint $table) {
            // $table->id();
            // $table->string('registrtations_id')->nullable();
            // $table->string('language')->nullable();
            // $table->string('speak')->nullable();
            // $table->string('read')->nullable();
            // $table->string('write')->nullable();
            $table->id();
            $table->string('registrtations_id')->nullable();
            $table->integer('th_speak')->nullable();
            $table->integer('th_read')->nullable();
            $table->integer('th_write')->nullable();
            $table->integer('en_speak')->nullable();
            $table->integer('en_read')->nullable();
            $table->integer('en_write')->nullable();
            $table->integer('ch_speak')->nullable();
            $table->integer('ch_read')->nullable();
            $table->string('ch_write')->nullable();
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
        Schema::dropIfExists('registrtations_aptitude');
    }
}
