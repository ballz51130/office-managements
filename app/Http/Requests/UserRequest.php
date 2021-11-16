<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'title_name'=> 'required',
            'id_card'=> 'required|min:13|numeric',
            'name'=> 'required',
            'brithday'=> 'required',
            'phone'=> 'required|numeric|min:10',
          //  'image'=> 'required',
            'house_number'=> 'required',
            'district'=> 'required',
            'amphures'=> 'required',
            'province'=> 'required',
            'zipcode'=> 'required|numeric',
            //  'identification_card'=> 'required',
            // 'house_registration'=> 'required',
            // 'etc'=> 'required',
            // 'status'=> 'required',
            'pos_id'=> 'required',
            'dep_id'=> 'required',
            'salary'=> 'required|numeric',
            'salary_type'=> 'required',
            'name_bank'=> 'required',
            'number_bank'=> 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'กรุณากรอกชื่อผู้เข้าใช้',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'อีเมลไม่ถูกต้อง',
            'email.unique' => 'อีเมลถูกใช้ไปแล้ว',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min'=>'รหัสผ่านต้องมีมากว่า 6 ตัวอักษร',
            'title_name.required'=>'กรุณาเลือกคำนำหน้าชื่อ',
            'id_card.required'=>'กรุณาเพิ่มสำเนาบัตรประจำตัวประชาชน',
            'id_card.min'=>'เลขบัตรประจำตัวประชาชนต้องมีอย่างน้อย 13 ตัวอักษร',
            'id_card.max'=>'เลขบัตรประจำตัวประชาชนต้องมีไม่เกิน 13 ตัวอักษร',
            'id_card.numeric'=>'เลขบัตรประจำตัวประชาชนต้องเป็นตัวเลข 0-9 เท่านั้น',
            'name.required' => 'กรุณากรอกชื่อ - สกุล',
            'brithday.required'=>'กรุณากรอกข้อมูลวันเกิด',
            'phone.required'=>'กรุณากรอกเบอร์โทรศัพท์',
            'phone.numeric'=>'เบอร์โทรศัพท์ต้องเป็นตัวเลข 0-9 เท่านั้น',
            'phone.min'=>'เบอร์โทรศัพท์ต้องมีอย่างน้อย 10 ตัวอักษร',
            //'image.required'=>'กรุณากรอก',
            'house_number.required'=>'กรุณากรอกที่อยู่',
            //'road.required'=>'กรุณากรอก',
            'district.required'=>'กรุณากรอกตำบล',
            'amphures.required'=>'กรุณากรอกอำเภอ',
            'province.required'=>'กรุณากรอกจังหวัด',
            'zipcode.required'=>'กรุณากรอกรหัสไปรษณีย์',
            'zipcode.numeric'=>'รหัสไปรษณีย์ต้องเป็นตัวเลข 0-9 เท่านั้น',
        //    'identification_card.required'=>'กรุณากรอก',
        //    'house_registration.required'=>'กรุณากรอก',
        //    'etc.required'=>'กรุณากรอก',
            'status.required'=>'กรุณากรอก',
            'dep_id.required'=>'กรุณาเลือกแผนกงาน',
            'pos_id.required'=>'กรุณาเลือกตำแหน่งงาน',
            'salary.required'=>'กรุณากรอกค่าตอบแทน',
            'salary.numeric'=>'ค่าตอบแทนต้องเป็นตัวเลข 0-9 เท่านั้น',
            'salary_type.required'=>'กรุณาเลือกประเภท',
            'name_bank.required'=>'กรุณาเลือกธนาคาร',
            'number_bank.required'=>'กรุณากรอกบัญชีการชำระ',
            'number_bank.numeric '=>'บัญชีการชำระต้องเป็นเลข 0-9 เท่านั้น',

        ];
    }

    public function validator()
    {
        return Validator::make($this->all(), $this->rules(), $this->messages(), $this->attributes());
    }

    public function attributes()
    {
        return [];
    }
}


/*

        // $request->validate([
        //     'username'=> 'required',
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:8',
        //     'title_name'=> 'required',
        //     'id_card'=> 'required|min:13|numeric',
        //     'brithday'=> 'required',
        //     'phone'=> 'required|numeric|min:10',
        //   //  'image'=> 'required',
        //     'house_number'=> 'required',
        //     'district'=> 'required',
        //     'amphures'=> 'required',
        //     'province'=> 'required',
        //     'zipcode'=> 'required|numeric',
        //     //  'identification_card'=> 'required',
        //     //'house_registration'=> 'required',
        //    // 'etc'=> 'required',
        //     // 'status'=> 'required',
        //     'department'=> 'required',
        //     'position'=> 'required',
        //     'salary'=> 'required|numeric',
        //     'salary_type'=> 'required',
        //     'name_bank'=> 'required',
        //     'number_bank'=> 'required|numeric',

        // ],[
        //     'username.required'=>'กรุณากรอก username',
        //     'name.required'=>'กรุณากรอกชื่อ-สกุล',
        //     'email.required' => 'กรุณากรอกอีเมล',
        //     'email.email' => 'อีเมลไม่ถูกต้อง',
        //     'email.unique' => 'อีเมลถูกใช้ไปแล้ว',
        //     'password.required' => 'กรุณากรอกรหัสผ่าน',
        //     'password.min'=>'รหัสผ่านต้องมีมากว่า 8 ตัวอักษร',
        //     'title_name.required'=>'กรุณาเลือกคำนำหน้าชื่อ',
        //     'id_card.required'=>'กรุณาเพิ่มสำเนาบัตรประจำตัวประชาชน',
        //     'id_card.min'=>'เลขบัตรประจำตัวประชาชนต้องมีอย่างน้อย 13 ตัวอักษร',
        //     'id_card.max'=>'เลขบัตรประจำตัวประชาชนต้องมีไม่เกิน 13 ตัวอักษร',
  	    //     'id_card.numeric'=>'เลขบัตรประจำตัวประชาชนต้องเป็นตัวเลข 0-9 เท่านั้น',
        //     'brithday.required'=>'กรุณากรอกข้อมูลวันเกิด',
        //     'phone.required'=>'กรุณากรอกเบอร์โทรศัพท์',
        //     'phone.numeric'=>'เบอร์โทรศัพท์ต้องเป็นตัวเลข 0-9 เท่านั้น',
        //     'phone.min'=>'เบอร์โทรศัพท์ต้องมีอย่างน้อย 10 ตัวอักษร',
        //     //'image.required'=>'กรุณากรอก',
        //     'house_number.required'=>'กรุณากรอกที่อยู่',
        //     //'road.required'=>'กรุณากรอก',
        //     'district.required'=>'กรุณากรอกตำบล',
        //     'amphures.required'=>'กรุณากรอกอำเภอ',
        //     'province.required'=>'กรุณากรอกจังหวัด',
        //     'zipcode.required'=>'กรุณากรอกรหัสไปรษณีย์',
        //     'zipcode.numeric'=>'รหัสไปรษณีย์ต้องเป็นตัวเลข 0-9 เท่านั้น',
        //    //'identification_card.required'=>'กรุณากรอก',
        //    // 'house_registration.required'=>'กรุณากรอก',
        //    // 'etc.required'=>'กรุณากรอก',
        //     'status.required'=>'กรุณากรอก',
        //     'department.required'=>'กรุณาเลือกแผนกงาน',
        //     'position.required'=>'กรุณาเลือกตำแหน่งงาน',
        //     'salary.required'=>'กรุณากรอกค่าตอบแทน',
        //     'salary.numeric'=>'ค่าตอบแทนต้องเป็นตัวเลข 0-9 เท่านั้น',
        //     'salary_type.required'=>'กรุณาเลือกประเภท',
        //     'name_bank.required'=>'กรุณาเลือกธนาคาร',
        //     'number_bank.required'=>'กรุณากรอกบัญชีการชำระ',
        //     'number_bank.numeric '=>'บัญชีการชำระต้องเป็นเลข 0-9 เท่านั้น',
        // ]);
*/
