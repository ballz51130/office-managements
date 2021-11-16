<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewlistsStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewlists', function (Blueprint $table) {
            $table->id();
            $table->integer('registration_id')->nullable()->comment('รหัสการรับสมัคร');
            $table->date('date')->nullable()->comment('วันนัดสัมภาษณ์');
            $table->string('detail')->nullable()->comment('รายระเอียด');
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
        Schema::dropIfExists('interviewlists');
    }
}
