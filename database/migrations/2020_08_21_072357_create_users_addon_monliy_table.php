<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAddonMonliyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_addon_monliy', function (Blueprint $table) {
            $table->id();
            $table->string('salary_momliy_detail_id')->nullable()->comment('รหัสรายระเอียดเงินเดือน');
            $table->string('user_id')->nullable()->comment('รหัสพนักงาน');
            // รายการได้
            $table->float('overtime', 8, 2)->nullable()->comment('ค่าล่วงเวลา');
            $table->float('commision', 8, 2)->nullable()->comment('ค่าคอมมิดชั่น');
            $table->float('bonus', 8, 2)->nullable()->comment('ค่าโบนัส');
            $table->float('extra_money', 8, 2)->nullable()->comment('เงินพิเศษ');
            $table->float('other_benefits', 8, 2)->nullable()->comment('ได้อื่นๆ');
            //รายการเสีย
            $table->float('latetime', 8, 2)->nullable()->comment('ค่ามาสาย');
            $table->float('absent_works', 8, 2)->nullable()->comment('ค่าขาด');
            $table->float('etc', 8, 2)->nullable()->comment('อื่นๆ');
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
        Schema::dropIfExists('users_addon_monliy');
    }
}
