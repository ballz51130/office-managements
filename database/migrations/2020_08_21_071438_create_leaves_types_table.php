<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_types', function (Blueprint $table) {
            $table->id();
            $table->string('topic')->nullable()->comment('ประเภทการลา');
            $table->string('detail')->nullable()->comment('รายละเอียด');
            $table->string('num_day')->nullable()->comment('จำนวนวันที่ลาได้');
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
        Schema::dropIfExists('leaves_types');
    }
}
