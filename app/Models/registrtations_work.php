<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registrtations_work extends Model
{
    //
    protected $table ='registrtations_work_detail';
    protected $fillable =['registrtations_id','workplace','start','end','position','job_description','salary','reason_for_issue'];
    public $pimarykey="id";
}