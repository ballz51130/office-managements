<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInformationsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('username')->nullable()->comment('ชื่อผู้ใช้');
            $table->string('title_name')->nullable()->comment('คำนำหน้า');
            $table->string('id_card')->nullable()->comment('รหัสบัตรประชาชน');
            $table->date('brithday')->nullable()->comment('วันเกิด');
            $table->string('phone')->nullable()->comment('โทรศัพท์');
            $table->binary('image')->nullable()->comment('รูป');
            $table->string('house_number')->nullable()->comment('บ้านเลขที่');
            $table->string('road')->nullable()->comment('ถนน');
            $table->string('district')->nullable()->comment('ตำบล');
            $table->string('amphures')->nullable()->comment('อำเภอ');
            $table->string('province')->nullable()->comment('จังหวัด');
            $table->integer('zipcode')->nullable()->comment('รหัสไปรษณีย์');
            $table->string('identification_card')->nullable()->comment('สำเนาบัตรประจำตัว');
            $table->string('house_registration')->nullable()->comment('สำเนาทะเบียนบ้าน');
            $table->string('etc')->nullable()->comment('สำเนาอื่นๆ');
            $table->integer('dep_id')->nullable()->comment('แผนกงาน');
            $table->integer('pos_id')->nullable()->comment('ตำแหน่งงาน');
            $table->boolean('status')->nullable()->comment('สถานะการใช้งาน');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
