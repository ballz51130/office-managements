<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {

            $table->id();
            $table->string('job_id')->nullable()->comment('รหัสงานที่สมัคร');
            $table->string('title_name')->nullable()->comment('คำนำหน่า');
            $table->string('name')->nullable()->comment('ชื่อ');
            $table->string('nickname')->nullable()->comment('ชื่อเล่น');
            $table->string('title_name_eng')->nullable()->comment('คำนำหน่า');
            $table->string('name_eng')->nullable()->comment('ชื่อภาษาอังกฤษ');
            $table->string('sex')->nullable()->comment('เพศ');
            $table->binary('image')->nullable()->comment('รูป');
            $table->string('salary')->nullable()->comment('เงินเดือนที่ต้องการ');
           
            // ประวัติส่วนตัว
            $table->string('house_number')->nullable()->comment('บ้านเลขที่');
            $table->string('moo')->nullable()->comment('หมู่');
            $table->string('road')->nullable()->comment('ถนน');
            $table->string('district')->nullable()->comment('ตำบล');
            $table->string('amphur')->nullable()->comment('อำเภอ');
            $table->string('province')->nullable()->comment('จังหวัด');
            $table->integer('zipcode')->nullable()->comment('รหัสไปรษณีย์');
            $table->string('email')->nullable()->comment('อีเมล์');
            $table->string('live_as')->nullable()->comment('บ้านพักอาศัยเป็น');
            $table->string('others')->nullable()->comment('อื่นๆระบุ');
            $table->date('brithday', 0)->nullable()->comment('วัน/เดือน/ปีเกิด');
            $table->integer('old')->nullable()->comment('อายุ *');
            $table->integer('height')->nullable()->comment('ส่วนสูง');
            $table->integer('weight')->nullable()->comment('น้ำหนัก');
            $table->string('nationality')->nullable()->comment('สัญชาติ');
            $table->string('race')->nullable()->comment('เชื้อชาติ');
            $table->string('religion')->nullable()->comment('ศาสนา');
            $table->string('id_card')->nullable()->comment('เลขบัตรประชาชน');
            $table->string('place_of_issue')->nullable()->comment('สถานที่ออกบัตร ');
            $table->date('card_expired', 0)->nullable()->comment('บัตรหมดอายุ ');
            $table->string('taxpayer')->nullable()->comment('บัตรผู้เสียภาษีเลขที่');
            $table->string('social_security_card')->nullable()->comment('บัตรประกันสังคมเลขที่');
            $table->string('military')->nullable()->comment('ภาวะทางทหาร');
            $table->integer('military_year')->nullable()->comment('จะเกณฑ์ในปี');

            //ประวัติครอบครัว
            $table->string('marriage_status')->nullable()->comment('สถานภาพ');
            $table->string('marriage_registration')->nullable()->comment('กรณีแต่งงาน');
            $table->string('marriage_name')->nullable()->comment('ชื่อ สามี / ภรรยา');
            $table->string('work')->nullable()->comment('ชื่อสถานที่ทำงาน');
            $table->string('position')->nullable()->comment('ตำแหน่งงาน');
            $table->string('child')->nullable()->comment('จำนวนบุตร');
            $table->string('child_study')->nullable()->comment('จำนวนบุตรที่กำลังศึกษา');
            $table->string('chid_nonstudy')->nullable()->comment('จำนวนบุตรที่ยังไม่ได้เข้าศึกษา');
            
            // ความถนัด
            $table->string('talent')->nullable()->comment('ความสามารถพิเศษ');
            $table->string('hobby')->nullable()->comment('งานอดิเรก');
            $table->string('sport')->nullable()->comment('กีฬาที่ชอบ');
            $table->string('knowledge')->nullable()->comment('ความรู้พิเศษ');
            $table->string('other_talent')->nullable()->comment('ความสามารถพิเศษอื่นๆ');
            //ข้อมูลติดต่อฉุกเฉิน
            $table->string('contactrelated_as')->nullable()->comment('กรณีฉุกเฉินบุคคลที่ติดต่อได้');
            $table->string('contact_phone')->nullable()->comment('เบอร์ติดต่อ');
            $table->string('contact_house_number')->nullable()->comment('ที่อยู่ตามทะเบียนบ้าน');
            $table->string('contact_moo')->nullable()->comment('หมู่ที่');
            $table->string('contact_road')->nullable()->comment('ถนน');
            $table->string('contact_district')->nullable()->comment('ตำบล/แขวง');
            $table->string('contact_amphur')->nullable()->comment('อำเภอ/เขต');
            $table->string('contact_province')->nullable()->comment('จังหวัด');
            $table->integer('contact_zipcode')->nullable()->comment('รหัสไปรษณีย์');
            $table->string('contact_email')->nullable()->comment('อีเมล');
            //ข้อมูลสำคัญเพิ่มเติม
            $table->boolean('prosecuted')->nullable()->comment('ท่านเคยถูกดำเนินคดี');
            $table->string('prosecuted_detail')->nullable()->comment('คำอธิบายเพิ่มเติม');
            $table->boolean('contagion')->nullable()->comment('ท่านเคยป่วยหนักหรือโรคร้ายแรง');
            $table->string('contagion_detail')->nullable()->comment('คำอธิบายเพิ่มเติม');
            $table->boolean('congenital_disease')->nullable()->comment('ท่านมีโรคประจำตัว');
            $table->string('congenital_disease_detail')->nullable()->comment('คำอธิบายเพิ่มเติม');
            $table->string('about_yourself')->nullable()->comment('แนะนำตัวเอง');
            
            $table->string('status')->nullable()->comment('สถานะตรวจสอบ');
            $table->integer('status_rols')->nullable()->comment('จำนวนที่กำหนดการตรวจสอบ');
            $table->string('status_detail')->nullable()->comment('หมายเหตุของสถานะ');
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
        Schema::dropIfExists('registrations');
    }
}
