<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryMonliyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_monliy', function (Blueprint $table) {
            $table->id();
            $table->string('monthly_reports')->nullable()->comment('รหัสพนักงาน');
            $table->string('total_users')->nullable()->comment('จำนวนพนักงาน');
            $table->float('total_income', 8, 2)->nullable()->comment('รายจ่ายทั้งหมด');
            $table->float('total_deductions', 8, 2)->nullable()->comment('รายได้จาก หัก ค่าประกัน');
            $table->string('payment')->nullable()->comment('ช่องทางการชำระเงิน');
            $table->string('type')->nullable()->comment('ประเภทเงินเดือน'); // momthly or daily
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
        Schema::dropIfExists('salary_monliy');
    }
}
