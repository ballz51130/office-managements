<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('leave_id')->nullable()->comment('ประเภท');
            $table->string('write_at')->nullable()->comment('เขียนที่');
            $table->date('date')->nullable()->comment('วันที่เขียน');
            $table->string('leave_title')->nullable()->comment('เรื่องขอลา');
            $table->string('dear')->nullable()->comment('เรียน');
            $table->string('user_id')->nullable()->comment('รหัสพนักงาน');
            $table->string('department')->nullable()->comment('แผนก');
            $table->string('detail')->nullable()->comment('รายละเอรยดการลา');
            $table->string('reason')->nullable()->comment('เหตุผลการลา');
            $table->string('start_date')->nullable()->comment('วันที่เริ่มลา');
            $table->string('end_date')->nullable()->comment('ถึงวัน');
            $table->integer('days')->nullable()->comment('จำนวนวัน');
            $table->string('communication')->nullable()->comment('ติดต่อ');
            $table->string('document')->nullable()->comment('เอกสาร');
            $table->string('status')->nullable()->comment('สถานะการลา');
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
        Schema::dropIfExists('leaves');
    }
}
