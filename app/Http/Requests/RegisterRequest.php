<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      
        $validator = [
            'title_name'=> 'required',
            'name'=> 'required',
            'nickname'=> 'required',
            'title_name_eng'=> 'required',
            'name_eng'=> 'required',
            'sex'=> 'required',
            'image'=> 'required',
            'salary'=> 'required',     
            'house_number'=> 'required',
            'moo'=> 'required',
            'road'=> 'required',
            'district'=> 'required',
            'amphur'=> 'required',
            'province'=> 'required',
            'zipcode'=> 'required',
            'email'=> 'required',
            'live_as'=> 'required',
            'brithday'=> 'required',
            'old'=> 'required',
            'height'=> 'required',
            'weight'=> 'required',
            'nationality'=> 'required',
            'race'=> 'required',
            'religion'=> 'required',
            'id_card'=> 'required',
            'place_of_issue'=> 'required',
            'card_expired'=> 'required',
            'taxpayer'=> 'required',
            'social_security_card'=> 'required',
            'military'=> 'required',
            'marriage_status'=> 'required',
            'talent'=> 'required',
            'hobby'=> 'required',
            'sport'=> 'required',
            'knowledge'=> 'required',
            'other_talent'=> 'required',
            'contactrelated_as'=> 'required',
            'contact_phone'=> 'required',
            'contact_house_number'=> 'required',
            'contact_moo'=> 'required',
            'contact_road'=> 'required',
            'contact_district'=> 'required',
            'contact_amphur'=> 'required',
            'contact_province'=> 'required',
            'contact_zipcode'=> 'required',
            'contact_email'=> 'required',
            'prosecuted'=> 'required',
            'contagion'=> 'required',
            'congenital_disease'=> 'required',
            'about_yourself'=> 'required',
        ];
      
            return $validator;
        
            
        
    }
    public function messages()
    {
        return [
            'title_name.required' => 'กรุณากรอก',
            'name.required' => 'กรุณากรอก',
            'nickname.required' => 'กรุณากรอก',
            'title_name_eng.required' => 'กรุณากรอก',
            'name_eng.required' => 'กรุณากรอก',
            'nickname_eng.required' => 'กรุณากรอก',
            'image.required' => 'กรุณาใส่รูปภาพ',
            'salary.required' => 'กรุณากรอก',     
            'house_number.required' => 'กรุณากรอก',
            'moo.required' => 'กรุณากรอก',
            'road.required' => 'กรุณากรอก',
            'district.required' => 'กรุณากรอก',
            'amphur.required' => 'กรุณากรอก',
            'province.required' => 'กรุณากรอก',
            'zipcode.required' => 'กรุณากรอก',
            'email.required' => 'กรุณากรอก',
            'live_as.required' => 'กรุณากรอก',
            'brithday.required' => 'กรุณากรอก',
            'old.required' => 'กรุณากรอก',
            'height.required' => 'กรุณากรอก',
            'weight.required' => 'กรุณากรอก',
            'nationality.required' => 'กรุณากรอก',
            'race.required' => 'กรุณากรอก',
            'religion.required' => 'กรุณากรอก',
            'id_card.required' => 'กรุณากรอก',
            'place_of_issue.required' => 'กรุณากรอก',
            'card_expired.required' => 'กรุณากรอก',
            'taxpayer.required' => 'กรุณากรอก',
            'social_security_card.required' => 'กรุณากรอก',
            'military.required' => 'กรุณากรอก',
            'military_year.required' => 'กรุณากรอก',
            'marriage_status.required' => 'กรุณากรอก',
            'marriage_registration.required' => 'กรุณากรอก',
            'marriage_name.required' => 'กรุณากรอก',
            'work.required' => 'กรุณากรอก',
            'position.required' => 'กรุณากรอก',
            'child.required' => 'กรุณากรอก',
            'child_study.required' => 'กรุณากรอก',
            'chid_nonstudy.required' => 'กรุณากรอก',
            'talent.required' => 'กรุณากรอก',
            'hobby.required' => 'กรุณากรอก',
            'sport.required' => 'กรุณากรอก',
            'knowledge.required' => 'กรุณากรอก',
            'other_talent.required' => 'กรุณากรอก',
            'contactrelated_as.required' => 'กรุณากรอก',
            'contact_phone.required' => 'กรุณากรอก',
            'contact_house_number.required' => 'กรุณากรอก',
            'contact_moo.required' => 'กรุณากรอก',
            'contact_road.required' => 'กรุณากรอก',
            'contact_district.required' => 'กรุณากรอก',
            'contact_amphur.required' => 'กรุณากรอก',
            'contact_province.required' => 'กรุณากรอก',
            'contact_zipcode.required' => 'กรุณากรอก',
            'contact_email.required' => 'กรุณากรอก',
            'prosecuted.required' => 'กรุณากรอก',
            'prosecuted_detail.required' => 'กรุณากรอก',
            'contagion.required' => 'กรุณากรอก',
            'contagion_detail.required' => 'กรุณากรอก',
            'congenital_disease.required' => 'กรุณากรอก',
            'congenital_disease_detail.required' => 'กรุณากรอก',
            'about_yourself.required' => 'กรุณากรอก',
            
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