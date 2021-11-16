<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryMonliyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_monliy_users', function (Blueprint $table) {
            $table->id();
            $table->string('salary_monliy_id')->nullable()->comment('รหัสรายการเงินเดือน');
            $table->string('users_id')->nullable()->comment('รหัสพนักงาน');
            $table->float('total_income', 8, 2)->nullable()->comment('รายการได้ทั้งหมด');
            $table->float('total_deductions', 8, 2)->nullable()->comment('รายการหักทั้งหมด');
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
        Schema::dropIfExists('salary_monliy_users');
    }
}
