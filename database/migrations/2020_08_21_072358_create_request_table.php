<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->comment('รหัสพนักงาน');
            $table->string('topic')->nullable()->comment('หัวข้อการร้องขอ');
            $table->string('detail')->nullable()->comment('เหตุผล');
            $table->time('days', 0)->nullable()->comment('วันที่ขอ');
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
        Schema::dropIfExists('request');
    }
}
