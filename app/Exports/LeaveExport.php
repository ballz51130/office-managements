<?php

namespace App\Exports;
use DB;
use App\User;
use App\Models\leave;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class LeaveExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $data = leave::select( 'users.id','users.name','users.phone',  'positions.name as positions ' , 'departments.name as departments',
        leave::raw('count(leaves.user_id) AS count'),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 1 THEN 1 ELSE 0 END) AS VacationTime '),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 1 THEN leaves.days ELSE 0 END) AS VacationDay' ),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 2 THEN 1 ELSE 0 END) AS  leaveTime '),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 2 THEN leaves.days ELSE 0 END) AS  leaveDay' ),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 3 THEN 1 ELSE 0 END) AS SickleaveTime '),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 3 THEN leaves.days ELSE 0 END) AS SickleaveDay' ),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 4 THEN 1 ELSE 0 END) AS MaternityleaveTime '),
        leave::raw('SUM(CASE WHEN leaves.leave_id = 4 THEN leaves.days ELSE 0 END) AS MaternityleaveDay' ),

        leave::raw('count(leaves.user_id) AS allcount '),
       )
       ->leftjoin('users', 'leaves.user_id', '=', 'users.id')
       ->leftjoin('leaves_types',"leaves_types.id","=","leaves.leave_id")
       ->leftjoin('positions',"positions.id","=","users.pos_id")
       ->leftjoin('departments',"departments.id","=","users.dep_id")
       ->where('leaves.status',"=","ผ่านการอนุมัติ")
       ->groupBy('leaves.user_id')
       ->get();
     

    }
    public function headings(): array
    {
        return [
            'รหัสพนักงาน',
            'ชื่อพนักงาน',
            'เบอร์โทรศัพทย์',
            'ตำแหน่ง',
            'ฝ่าย/แผนก',
            'จำนวนที่ลาทั้งหมด(ครั้ง)',
            'ลาพักร้อน',
            'จำนวน',
            'ลากิจ',
            'จำนวน',
            'ลาป่วย',
            'จำนวน',
            'ลาคลอด',
            'จำนวน',
            'รวมลาทั้งหมด'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // All headers - set font size to 14
                $cellRange = 'A1:W1'; 
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    
                // Set A1:D4 range to wrap text in cells
                $event->sheet->getDelegate()->getStyle('A1:N1')
                    ->getAlignment()->setWrapText(true);
            },
        ];
    }

}
