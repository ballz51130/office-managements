<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar');
    }

    public function navigations()
    {

        $items = [];
        $items[] = [
            'path' => '/',
            'name' => 'แดชบอร์ด',
            'icon' => '<i class="fa fa-line-chart" aria-hidden="true"></i>'
        ];

        $items[] = [
            'path' => '/users',
            'name' => 'พนักงาน',
            'icon' => '<i class="fa fa-address-book-o" aria-hidden="true"></i>',

            'sub' => [
                ['path' => '/users', 'name' => 'รายชื่อพนักงาน'],
                ['path' => '/users/departments', 'name' => 'แผนกงาน'],
                ['path' => '/users/positions', 'name' => 'ตำแหน่งงาน'],
            ],

        ];

        $items[] = [
            'path' => '/jobs',
            'name' => 'รับสมัครงาน',
            'icon' => '<i class="fa fa-sticky-note" aria-hidden="true"></i>',

            'sub' => [
                ['path' => '/jobs/candidates/', 'name' => 'การรับสมัครพนักงาน'],
                ['path' => '/jobs/', 'name' => 'ใบรับสมัครงานทั้งหมด'],
                ['path' => '/jobs/interviewlists/', 'name' => 'รายการสัมภาษณ์'],
                ['path' => '/jobs/interviewhistory/', 'name' => 'ประวัติการสัมภาษณ์'],
            ],

        ];

        $items[] = [
            'path' => '/laeves',
            'name' => 'การลางาน',
            'icon' => '<i class="fa fa-clock-o" aria-hidden="true"></i>',

            'sub' => [
                ['path' => '/leaves/', 'name' => 'ข้อมูลการลางาน'],
                // ['path' => '/leaves/user', 'name' => 'ข้อมูลการลางาน (user)'],
                ['path' => '/leaves/report', 'name' => 'สรุปรายงานการลา'],

            ],
        ];

        $items[] = [
            'path' => '/clocked',
            'name' => 'การเข้า-ออกงาน',
            'icon' => '<i class="fa fa-clock-o" aria-hidden="true"></i>',

            'sub' => [
                ['path' => '/clocks/', 'name' => 'รายการเข้า-ออกงาน'],
                ['path' => '/clocks/dashboard', 'name' => 'แดชบอร์ด'],
                ['path' => '/clockssetting', 'name' => 'เวลาเข้า-ออกงาน'],
                ['path' => '/locations', 'name' => 'ตั้งค่าสถานที่'],
            ],
        ];

        $items[] = [
            'path' => '/salarys',
            'name' => 'เงินเดือน',
            'icon' => '<i class="fa fa-credit-card" aria-hidden="true"></i>',

            'sub' => [
                ['path' => '/salarys', 'name' => 'รายการค่าใช้จ่าย'],
                ['path' => '/salarys/MD', 'name' => 'รายการค่าใช้จ่าย(MD)'],
                ['path' => '/salarys/history', 'name' => 'ประวัติการรับเงินเดือน'],
            ],
        ];

        $items[] = [
            'path' => '/salary/cost',
            'name' => 'รายงาน',
            'icon' => '<i class="fa fa-bar-chart" aria-hidden="true"></i>',

            'sub' => [
                ['path' => '/salary/cost', 'name' => 'สรุปค่าใช้จ่าย'],
                ['path' => '/salary/payment', 'name' => 'ยอดชำระค่าใช้จ่าย'],
            ],
        ];

        // $items[] = [
        //     'path' => '/salary/MD/cost',
        //     'name' => 'รายงาน(MD)',
        //     'icon' => '<i class="fa fa-bar-chart" aria-hidden="true"></i>',

        //     'sub' => [
        //         ['path' => '/salary/MD/cost', 'name' => 'สรุปค่าใช้จ่าย'],
        //         ['path' => '/salary/MD/payment', 'name' => 'ยอดชำระค่าใช้จ่าย'],
        //     ],
        // ];

        return $this->convert($items);
    }

    public function convert($navs)
    {

        foreach ($navs as $n => $nav) {

            $isExactActive = false;

            if(!empty($nav['sub'])){

                foreach ($nav['sub'] as $i => $item) {

                    if( isset($item['path']) ){

                        $path = trim($item['path'], '/');

                        if($this->get_current_path()==$path){
                            $navs[$n]['sub'][$i]['isActive'] =true;
                        }

                        if($this->get_current_path()==$path || request()->is($path, $path.'/*')){
                            $isExactActive = true;
                        }
                    }
                }

                if( $isExactActive ){
                    $navs[$n]['isExactActive'] = true;
                }

            }
            else if( isset($nav['path']) ){

                $path = trim($nav['path'], '/');

                if($this->get_current_path()==$path || request()->is($path, $path.'/*')){
                    $navs[$n]['isActive'] = true;
                }
            }
        }

        return $navs;
    }

    public function get_first_path()
    {
        $current = Route::getFacadeRoot()->current();
        $uri = $current->uri();

        $uris = explode('/', $uri );
        return !empty($uris[0])? $uris[0]: '/';
    }

    public function get_current_path()
    {
        $current = Route::getFacadeRoot()->current();
        $uri = $current->uri();
        foreach ($current->parameters() as $key => $param) {
            $uri = str_replace('{' . $key . '}', $param, $uri);
        }

        return $uri;
    }
}
