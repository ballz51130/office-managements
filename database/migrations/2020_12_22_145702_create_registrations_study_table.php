<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations_study', function (Blueprint $table) {
            $table->id();
            $table->string('registrtations_id')->nullable();
            $table->string('educational')->nullable()->comment('วุฒิการศึกษา');
            $table->string('educational_detail')->nullable()->comment('ระดับวุฒิการศึกษา');
            $table->string('institution')->nullable()->comment('สถาบัน');
            $table->string('field_of_study')->nullable()->comment('สาขาวิชา');
            $table->string('start')->nullable()->comment('วันที่เริ่ม');
            $table->string('end')->nullable()->comment('วันที่จบ');
            $table->float('gpa',8,2)->nullable()->comment('เกรดเฉลีย');
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
        Schema::dropIfExists('registrations_study');
    }
}
