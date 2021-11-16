<?php


function leave_status(){

    return [
        ['slug'=>'', 'name'=>'ทั้งหมด'],
        ['slug'=>'waitcheck', 'name'=>'รอตรวจสอบ'],
        ['slug'=>'active', 'name'=>'อนุมัติแล้ว'],
        ['slug'=>'notactive', 'name'=>'ไม่ผ่านการอนุมัติ'],
    ];
}

function leave_status_tabs()
{
    $items = leave_status();

    foreach ($items as $key => $item) {
        $url = asset( "/leave/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}


