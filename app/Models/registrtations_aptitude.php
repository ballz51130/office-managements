<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registrtations_aptitude extends Model
{
    //
    protected $table ='registrtations_aptitude';
    protected $fillable =['registrtations_id','th_speak','th_read','th_write','en_speak','en_speak','en_read','en_write','ch_speak','ch_read','ch_write',];
    public $pimarykey="id";
}
