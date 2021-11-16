<?php

use Illuminate\Database\Seeder;
use App\Models\leave_type;
class leaves_typeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        leave_type::truncate();
        $datas = ['','ลาพักร้อน','ลากิจ','ลาป่วย','ลาคลอด',];

        for ($i = 1; $i <= 4; $i++) {
            $data = $datas[$i] ;
            leave_type::create([
                'topic' =>$data,
                'detail' => 'Test',
                'num_day'=> 5,
            ]);
        }
    }
}
