<?php

use Illuminate\Database\Seeder;
use App\Models\positionModel;
use App\Models\departmentModel;
class positionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        positionModel::truncate();
        $datas = ['','Web','Design','Mobile','UX/UI','Tester','Backend'];

        for ($i = 1; $i <= 6; $i++) {
            $data = $datas[$i] ;
            positionModel::create([
                'name'=>$data ,
            ]);
        }
    }
}
