<?php


function member_status(){

    return [
        ['slug'=>'', 'name'=>'ทั้งหมด'],
        ['slug'=>'active', 'name'=>'ใช้งาน'],
        ['slug'=>'notactive', 'name'=>'ระงับ'],
    ];
}

function member_status_tabs()
{
    $items = member_status();

    foreach ($items as $key => $item) {
        $url = asset( "/users/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}



function leave_status(){

    return [
        ['slug'=>'', 'name'=>'ทั้งหมด'],
        ['slug'=>'waitcheck', 'name'=>'รออนุมัติ'],
        ['slug'=>'active', 'name'=>'อนุมัติแล้ว'],
        ['slug'=>'notactive', 'name'=>'ไม่ผ่านการอนุมัติ'],
    ];
}

function leave_status_nav()
{
    $items = leave_status();

    foreach ($items as $key => $item) {
        $url = asset( "/leaves/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}

function leave_status_user(){

    return [
        ['slug'=>'user/1', 'name'=>'ทั้งหมด'],
        ['slug'=>'waitcheck', 'name'=>'รออนุมัติ'],
        ['slug'=>'active', 'name'=>'อนุมัติแล้ว'],
        ['slug'=>'notactive', 'name'=>'ไม่ผ่านการอนุมัติ'],
        ['slug'=>'cancelled', 'name'=>'ยกเลิก'],
    ];
}

function leave_status_nav_user()
{
    $items = leave_status_user();

    foreach ($items as $key => $item) {
        $url = asset( "/leave/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}
function jobs_status(){

    return [
        ['slug'=>'', 'name'=>'ทั้งหมด'],
        ['slug'=>'waitcheck', 'name'=>'รอตรวจสอบ'],
        ['slug'=>'active', 'name'=>'อนุมัติแล้ว'],
        ['slug'=>'notactive', 'name'=>'ไม่ผ่านการอนุมัติ'],
    ];
}

function jobs_status_nav()
{
    $items = jobs_status();

    foreach ($items as $key => $item) {
        $url = asset( "/jobs/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}

function salary_history(){
    return [
        ['slug'=>'', 'name'=>'ทั้งหมด'],
        ['slug'=>'waitcheck', 'name'=>'ชำระเงินแล้ว'],
        ['slug'=>'active', 'name'=>'อนุมัติแล้ว'],
        ['slug'=>'notactive', 'name'=>'ไม่ผ่านการอนุมัติ'],
    ];
}

function salary_history_status_nav()
{
    $items = salary_history();

    foreach ($items as $key => $item) {
        $url = asset( "/salarys/history/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}

function jobs(){
    return [
        ['slug'=>'', 'name'=>'ทั้งหมด'],
        ['slug'=>'active', 'name'=>'เปิดรับสมัคร'],
        ['slug'=>'notactive', 'name'=>'ปิดรับสมัคร'],
        ['slug'=>'timeout', 'name'=>'หมดอายุ'],
    ];
}

function jobs_nav()
{
    $items = jobs();

    foreach ($items as $key => $item) {
        $url = asset( "/jobs/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}

function  request_nav(){
    return [
        ['slug'=>'', 'name'=>'ทั้งหมด'],
        ['slug'=>'waitcheck', 'name'=>'รอดำเนินการ'],
        ['slug'=>'active', 'name'=>'รับการอนุมัติ'],
        ['slug'=>'notactive', 'name'=>'ไม่รับการอนุมัติ'],
    ];
}

function request_status_nav()
{
    $items = request_nav();

    foreach ($items as $key => $item) {
        $url = asset( "/requests/{$item['slug']}" );
        if( $url == request()->url() ){
            $items[$key]['isActive'] = true;
        }
        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}




