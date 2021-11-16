<?php

use Illuminate\Database\Seeder;
use App\Models\clockmodel;

class ClockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        clockmodel::truncate();
        $day = [1=>'จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์','อาทิตย์'];

        for ($i = 1; $i <= 7 ; $i++){
            $date = $day[$i] ;
            clockmodel::create([
                'day'=> $date,
                'time_checkin'=>'09:00:00',
                'time_checkout'=>'18:00:00',
                'late'=>'10:00:00',
                'absent_work'=>'11:00:00',
                'type' => rand(1,0),
            ]);

        }

    }
}
