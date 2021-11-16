<?php

use Illuminate\Database\Seeder;
use App\Models\leave;
class leavesseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        leave::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 5; $i++) {

            leave::create([
                'leave_id' => $faker->numberBetween($min = 1, $max = 4),
                'write_at' => $faker->address,
                'date' => $faker->date,
                'leave_title' => 'ขอลาหยุดงาน',
                'dear' => 'คุณ ยินดี มีชัย หัวหน้าฝ่ายบุคลลากร',
                'user_id' => $i,
                'detail' => 'มี ไข้ ตัวร้อน อาเจียน',
                'reason' => '',
                'start_date' => $faker->date,
                'end_date' => $faker->date,
                'days' => $i,
                'communication' =>$faker->PhoneNumber,
                'status' => 'รออนุมัติ',
            ]);
        }
    }
}
