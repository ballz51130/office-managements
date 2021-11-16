<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registrtations_study extends Model
{
    //
    protected $table ='registrations_study';
    protected $fillable =['registrtations_id','educational_detail','educational','institution','field_of_study','start','end','gpa',];
    public $pimarykey="id";
}
