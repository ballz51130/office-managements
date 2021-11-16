<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClockedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clocked', function (Blueprint $table) {
            $table->id();
            $table->string('users_id')->nullable()->comment('รหัสพนักงาน');
            $table->date('time_checkin')->nullable()->comment('เวลาเข้างาน');
            $table->date('time_checkout')->nullable()->comment('เวลาออกงาน');
            $table->string('status')->nullable()->comment('สถานะการเข้างาน');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clocked');
    }
}
