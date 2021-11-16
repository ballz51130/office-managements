<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsWorkDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrtations_work_detail', function (Blueprint $table) {
            $table->id();
            $table->string('registrtations_id')->nullable()->comment('รหัสผู้สมัคร');
            $table->string('workplace')->nullable()->comment('สถานที่ทำงาน');
            $table->string('start')->nullable()->comment('วันที่เริม');
            $table->string('end')->nullable()->comment('วันที่ออก');
            $table->string('position')->nullable()->comment('ตำแหน่งงาน');
            $table->string('job_description')->nullable()->comment('คำอธิบายเพิ่มเติม');
            $table->float('salary',8,2)->nullable()->comment('เงินเดือน');
            $table->string('reason_for_issue')->nullable()->comment('เหตุผลที่ออก');
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
        Schema::dropIfExists('registrtations_work_detail');
    }
}
