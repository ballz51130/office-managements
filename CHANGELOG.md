## รายชื่อผู้สมัคร (2020-12-22)
- เพิ่มปุ่มตรวจสอบ - บอล
- ลบเพิ่มพนกงาน - บอล
- หัว รายชื่อพนักงาน => รายชื่อผู้สมัคร - บอล
- หัว เพิ่มฟิวเตอร์ - บอล

- ทำ seed ข้อมูลผู้สมัคร & ข้อมูลมาแสดง - บอล
- ตรวจข้อมูลผู้สมัคร พร้อกับ เปลี่ยนสถานะ - บอล

- สอน ส่งอีเมล์ - ชง

## ใบสมัครงาน (2020-12-19)
- กำหนดเวลาที่สมัคร ไม่ stamp (บอล)  // (Done)
- เพิ่มเปิดปิด สถานะ ใบรับสมัครงาน (บอล) (2020-12-19) // (Done)
- รายการสมัคร ข้อมูลต้อง ไม่ error (2020-12-19) // (Done)
- การลบข้อมูล (2020-12-19) // (Done)
- ปรับ UI ให้ตรงกัน (2020-12-19)// (Done)
- หน้าต่าง การรับสมัครงานของ User (ไอซ์) ## ประชุมวันจันทร์ (เรท) ยกเลิก (ชง 2020-12-23)
- เชื่อมข้อมูลกับตำแนกงาน & เปลี่ยน ตำแนหน่งงาน -> แผนกงาน (2020-12-22) - บอล

## จัดการพนักงาน (2020-12-11)
- การจัด layouts // 
    - เมนู (ไอซ์) 2020-12-23

- dabaase (Done)

- จัดการพนักงาน
 - รายชื่อพนักงาน 
    - รายการ 
    - เพิ่ม //
    - ลบ 
        - เปลียนภาษา  (2020-12-19) // (Done)
    - แก้ไข (บอลทำต่อ) 
        - ข้อมูลพื้นฐาน (Done) ขาดข้อมูลตามที่สมัคร (ไอซ์ => ปุ่ม, บอล => ปรับข้อมูลให้ตรวกับสมัคร) 
        - ตั้งค่าบัญชีผู้ใช้ (Done) 
        - ตั้งค่ารหัสผ่าน (Done)
        - ข้อมูลการจ้างงาน (ข้อมูลแผนกงาน / ตำแหน่งงาน) (บอล => ปรับข้อมูลให้เชื่อต่อกับ แผนก และ ตำแหน่งงาน) (Done)
        - ไฟล์เอกสาร (รอ)
        - การลา (รอ)

    - โช ตำแหน่งงาน (2020-12-22) - บอล
    - ลบ การใช้งาน (2020-12-22) - บอล
    - เพิ่มปุ่มเปิด/ปิด สถานะ (2020-12-22) - บอล

	- สคลิป ว่างตรงไหน /// 
	- บางระบบยังไม่เสร็จ
	- ลา 
	- ดาวน์โหดลเอกสาร

- แผนก (Done)
	- ลบ ไม่ได้
- ตำแหน่งงาน (Done)
	- ลบ ไม่ได้


## 1.0.5 (2020-10-05)
- `composer dump-autoload` -> `php artisan migrate:fresh --seed`
- `composer update`

## 1.0.4 (2020-08-29)
 - Added `users`
 - Mockup -> html & css
 - Validate Data Form 
 - Data add to database

## 1.0.4 (2020-08-27)
 - migrate databalse

### แบบมาตัด code [css,html,js]
#### Set Layouts (header, sidebar, main)
- Added `npm install` and `npm run dev`
- Added file `views/layouts/admin.blade.php`

#### Display Users
- Added make contoller UserContoller `php artisan make:contoller UserController`
- Added file `views/user/index.blade.php`

- Added user to db `php artisan make:seeder UserSeeder`
- Added user to db `php artisan db:seed --class=UserSeeder` // https://github.com/fzaninotto/Faker


## 1.0.3 - migrate
 - Open file app/Providers/AppServiceProvider.php update code to funtion boot: `Schema::defaultStringLength(191);` `use Illuminate\Support\Facades\Schema;`
 - Run command `php artisan migrate` // In the .env file, add database information to allow Laravel to connect to the database


## 1.0.2 - update auth

 - install auth Run command `composer require laravel/ui`
 - Run command `npm install --save`
 - Run command `npm run dep`
 - Run command `php artisan ui vue --auth`
 - Run command `php artisan serve` and open http://127.0.0.1:8000 on browser


## 1.0.1 - init

 - Clone GitHub repo for this project locally
 - Run command `composer install`
 - Copy .env.example -> .env and update environments value
 - Create database from mysql and set database name to env
 - Run command `php artisan key:generate`
 - Run command `php artisan serve` and open http://127.0.0.1:8000 on browser

## 1.0.0 - required

 - vscode
 - nodejs
 - composer
 - github desktop

 - xampp (php, mysql) for windown
