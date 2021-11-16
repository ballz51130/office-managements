<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobs_welfareModel extends Model
{
    //
    protected $table ='jobs_welfare';
    protected $fillable =['job_id','detail'];
    public $pimarykey="id";
}
