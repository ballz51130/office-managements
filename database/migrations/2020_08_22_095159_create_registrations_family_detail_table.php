<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsFamilyDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrtations_family_detail', function (Blueprint $table) {
            $table->id();
            $table->string('registrtations_id');
            $table->string('educational')->nullable()->comment('วุฒิการศึกษา');
            $table->string('institution')->nullable()->comment('สถาบัน');
            $table->string('field_of_study')->nullable()->comment('สาขาวิชา');
            $table->date('start')->nullable()->comment('วันที่เริ่ม');
            $table->date('end')->nullable()->comment('วันที่จบ');
            $table->float('gpa',8,2)->comment('เกรดเฉลีย');
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
        Schema::dropIfExists('registrtations_family_detail');
    }
}
