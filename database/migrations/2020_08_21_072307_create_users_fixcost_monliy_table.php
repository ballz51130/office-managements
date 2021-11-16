<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersFixcostMonliyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_fixcost_monliy', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->comment('รหัสพนักงาน');
            $table->string('title')->nullable()->comment('หัวข้อ');
            $table->float('amount', 8, 2)->nullable()->comment('จำนวน(บาท)');
            $table->integer('type')->nullable()->comment('ประเภท ได้/หัก'); 
            $table->string('status')->nullable()->comment('สถานะ เปิด/ปิด'); 
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
        Schema::dropIfExists('users_fixcost_monliy');
    }
}
