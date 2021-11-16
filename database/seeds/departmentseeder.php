<?php

use Illuminate\Database\Seeder;
use App\Models\departmentModel;
class departmentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        departmentModel::truncate();
        $datas = ['','แผนกงานขาย','โปรแกรมเมอร์','ผู้จัดการ','บัญชี','Tester'];

        for ($i = 1; $i <= 5; $i++) {
            $data = $datas[$i] ;
            departmentModel::create([
                'name'=>$data ,
            ]);
        }
    }
}
