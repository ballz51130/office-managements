<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewhistory', function (Blueprint $table) {
            $table->id();
            $table->integer('interviewlist_id')->nullable()->comment('รหัสการสัมภาษณ์');
            $table->date('date')->nullable()->comment('วันนัดสัมภาษณ์');
            $table->string('detail')->nullable()->comment('รหัสการสัมภาษณ์');
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
        Schema::dropIfExists('interviewhistory');
    }
}
