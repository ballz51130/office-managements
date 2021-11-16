<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClockedSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clocked_settings', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable()->comment('วัน จ-ศ');
            $table->time('time_checkin')->nullable()->comment('เวลาเข้างาน');
            $table->time('time_checkout')->nullable()->comment('เวลาออกงาน');
            $table->time('late', 0)->nullable()->comment('เลทได้');
            $table->time('freetime', 0)->nullable()->comment('เวลาพัก');
            $table->time('absent_work',0)->nullable()->comment('เกิดนี้ ขาด(นาที)'); // เกินจากนี้ ขาด
            $table->string('type')->nullable()->comment('สถานะ');
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
        Schema::dropIfExists('clocked_settings');
    }
}
