<?php

use Illuminate\Database\Seeder;
use App\Models\registrations;
use App\Models\registrtations_study;
use App\Models\registrtations_aptitude;
use App\Models\registrtations_work;
use App\Models\jobsModel;
class registrationsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        registrations::truncate();

        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 20; $i++) {
            registrations::create([
                'job_id' => $i,
                'title_name'=>$faker->randomElement(['นาย','นาง','นางสาว']),
                'name'=> $faker->name,
                'nickname'=> $faker->firstNameFemale ,
                'title_name_eng'=> $faker->titleMale ,
                'name_eng' => $faker->name,
                'sex'=> $faker->randomElement(['ชาย','หญิง']),
                'salary'=>$faker->numberBetween($min = 15000, $max = 50000),
                'house_number'=> $faker->address,
                'moo'=> $faker->numberBetween($min = 1, $max = 10),
                'road'=> $faker->secondaryAddress,
                'district'=> $faker->cityPrefix,
                'amphur'=> $faker->citySuffix,
                'province'=> $faker->state    ,
                'zipcode'=>$faker->postcode ,
                'email'=> $faker->email,
                'live_as'=> $faker->randomElement(['อาศัยอยู่กับครอบครัว','บ้านตัวเอง','บ้านเช่า','หอพัก']), 
                'brithday'=>  $faker->date,
                'old'=> $faker->numberBetween($min = 20, $max =60),
                'height'=> $faker->numberBetween($min = 150, $max =200),
                'weight'=> $faker->numberBetween($min = 40, $max =200),
                'nationality'=> 'ไทย',
                'race'=> 'ไทย',
                'religion'=> $faker->randomElement(['ศาสนาพุทธ','ศาสนาอิสลาม','ศาสนาคริสต์','ไม่มีศาสนา']), 
                'id_card'=>  $faker->creditCardNumber  ,
                'place_of_issue'=> $faker->secondaryAddress,
                'card_expired'=>$faker->date,
                'taxpayer'=> $faker->creditCardNumber,
                'social_security_card'=> $faker->creditCardNumber,
                'military'=> 'ได้รับการยกเว้น',
                'military_year'=> '' ,
                'marriage_status'=> 'โสด',
                'marriage_registration'=> '',
                'marriage_name'=> '',
                'work'=> '',
                'position'=>$faker->randomElement(['Web','Design','Mobile','UX/UI','Tester','Backend']),
                'child'=> '',
                'child_study'=> '',
                'chid_nonstudy'=> '',
                'talent'=>$faker->randomElement(['เขียนโปรแกรม','เล่นฟุ๊ตบอล','เล่นเกม','เล่นกีต้า']),
                'hobby'=> $faker->randomElement(['เล่นบาสเก็ตบอล','เล่นฟุ๊ตบอล','เล่นเกม','เล่นกีต้า']), 
                'sport'=>  $faker->randomElement(['บาสเก็ตบอล','ฟุ๊ตบอล','เทนนิส','วอลเลย์บอล']), 
                'knowledge'=>  $faker->randomElement(['เขียนโปรแกรม','ภาษาฝรั่งเศษ','ภาษาญีปุ่น']),
                'other_talent'=> $faker->randomElement(['เขียนโปรแกรม','ภาษาฝรั่งเศษ','ภาษาญีปุ่น']),
                'contactrelated_as'=> $faker->address,
                'contact_phone'=> $faker->PhoneNumber,
                'contact_house_number'=> $faker->address,
                'contact_moo'=>$faker->numberBetween($min = 1, $max = 10),
                'contact_road'=>  $faker->secondaryAddress,
                'contact_district'=>  $faker->cityPrefix,
                'contact_amphur'=>  $faker->citySuffix,
                'contact_province'=>$faker->state ,
                'contact_zipcode'=>$faker->postcode ,
                'contact_email'=> $faker->email,
                'prosecuted'=> rand(1,0),
                'prosecuted_detail'=> '',
                'contagion'=> rand(1,0),
                'contagion_detail'=> '',
                'congenital_disease'=> rand(1,0),
                'congenital_disease_detail'=> '',
                'about_yourself'=> '',
                'status'=>'รอตรวจสอบ',
            ]);
            registrtations_aptitude::create([
                'registrtations_id' =>$i,
                'th_speak'=> rand(1,0),
                'th_read'=> rand(1,0),
                'th_write'=> rand(1,0),
                'en_speak'=> rand(1,0),
                'en_speak'=> rand(1,0),
                'en_read'=> rand(1,0),
                'en_write'=> rand(1,0),
                'ch_speak'=> rand(1,0),
                'ch_read'=> rand(1,0),
                'ch_write'=> rand(1,0),

            ]);
            //registrtations_family
            $educational = ['','มัธยมศึกษา','ปวช','ปวท/ปวส','ปริญญาตรี','ปริญญาโท'];
            $educational2 = ['','ม.6','ปวช','ปวท/ปวส','4ปี','ปริญญาโท'];
            for ($i2 = 1; $i2 <= 5; $i2++) {
                $detail = $educational[$i2] ;
                $detail2 = $educational2[$i2] ;
                registrtations_study::create([
                    'registrtations_id'=>$i,
                    'educational'=> $detail,
                    'educational_detail' =>$detail2 ,
                    'institution'=>$faker->city,
                    'field_of_study'=>$faker->randomElement(['Software Engineering','System Analyst','Information Technology','Business Computer']),
                    'start'=>$faker->date,
                    'end'=>$faker->date,
                    'gpa'=>$faker->numberBetween($min = 1, $max = 4) ,

                ]);
            } // end for registrtations_family
        
         
                for ($i4 = 1; $i4 <= 3; $i4++) {
                    registrtations_work::create([
                            'registrtations_id'=>$i,
                            'workplace'=> $faker->city,
                            'start'=>$faker->date,
                            'end'=>$faker->date,
                            'position'=>$faker->randomElement(['Web','Design','Mobile','UX/UI','Tester','Backend']),
                            'job_description'=>'เขียนโปรแกรม',
                            'salary'=>$faker->numberBetween($min = 15000, $max = 50000),
                            'reason_for_issue'=> 'หาความท้าทายใหม่ๆ',

                    ]);
                }



        } //end for ใหญ่
    }
}
