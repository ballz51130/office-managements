<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class registrations extends Model
{
    protected $table ='registrations';
    public $pimarykey="id";
    protected $fillable =['job_id','title_name','name','nickname','title_name_eng','name_eng','sex','image','salary',
    'house_number','moo','road','district','amphur','province','zipcode','email','live_as','others','brithday',
    'old','height','weight','nationality','race','religion','id_card','place_of_issue','card_expired','taxpayer',
    'social_security_card','military','military_year','marriage_status','marriage_registration','marriage_name','work',
    'position','child','child_study','chid_nonstudy','talent','hobby','sport','knowledge','other_talent','contactrelated_as',
    'contact_phone','contact_house_number','contact_moo','contact_road','contact_district','contact_amphur','contact_province','contact_zipcode',
    'contact_email','prosecuted','prosecuted_detail','contagion','contagion_detail','congenital_disease','congenital_disease_detail',
    'about_yourself','status','status_rols','status_detail'];

    public function registrtations_aptitude()
    {
      
    return $this->belongsTo(registrtations_aptitude::class, 'id','registrtations_id' );
    }
    
    public function registrtations_work()
    {
        return $this->hasMany(registrtations_work::class, 'registrtations_id', 'id');
    }
    public function registrtations_study()
    {
        return $this->hasMany(registrtations_study::class, 'registrtations_id', 'id');
    }
    public function interviewlist()
    {
        return $this->belongsTo( interviewlistModel::class, 'id','registration_id' );
    }
    
}
