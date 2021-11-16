<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('ชื่อใบรับสมัคร');
            $table->string('subtitle')->nullable()->comment('คำบรรยายสั้นๆ');
            $table->string('salary')->nullable()->comment('เงินเดือน');
            $table->string('position')->nullable()->comment('แผนกงาน');
            $table->integer('quantity')->nullable()->comment('จำนวนที่รับสมัคร');
            $table->string('type')->nullable()->comment('ประเภท');
            $table->integer('times')->nullable()->comment('สถานะ เปิด/ปิด เวลา');
            $table->date('start')->nullable()->comment('วันเปิดสมัคร');
            $table->time('start_time')->nullable()->comment('วันเปิดสมัคร');
            $table->date('end')->nullable()->comment('วับปิดรับสมัคร');
            $table->time('end_time')->nullable()->comment('วันเปิดสมัคร');
            $table->binary('image')->nullable()->comment('รูป');
            $table->string('status')->nullable()->comment('สถานะ');

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
        Schema::dropIfExists('jobs_applications');
    }
}
