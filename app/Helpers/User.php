<?php

function user_status()
{

    return [
        ['slug' => '', 'name' => 'ทั้งหมด'],
        ['slug' => 'active', 'name' => 'ใช้งาน'],
        ['slug' => 'store', 'name' => 'ระงับ'],
        ['slug' => 'trash', 'name' => 'ถังขยะ'],
    ];
}

function user_status_tabs()
{
    $items = user_status();

    foreach ($items as $key => $item) {
        $url = asset("/users/{$item['slug']}");
        if ($url == request()->url()) {
            $items[$key]['isActive'] = true;
        }

        $items[$key]['url'] = $url;
    }

    return json_decode(json_encode($items));
}

function user_status_current()
{
    $data = null;
    foreach (user_status() as $item) {
        $url = asset("/users/{$item['slug']}");
        $item['url'] = $url;
        if ($url == request()->url()) {
            $data = $item;
        }
    }

    return !empty($data) ? json_decode(json_encode($data)) : null;
}

function user_fullname($user, $style = 1)
{
    switch ($style) {
        case 2:
            $name = "{$user->first_name}";
            if (!empty($user->prefix)) {
                $name = "{$user->prefix} {$name}";
            }
            break;

        default:
            $name = "{$user->first_name} {$user->last_name}";
            if (!empty($user->prefix)) {
                $name = "{$user->prefix} {$name}";
            }
            break;
    }


    return $name;
}
