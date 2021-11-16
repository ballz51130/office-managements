<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobs_propertyModel extends Model
{
    //
    protected $table ='jobs_property';
    protected $fillable =['job_id','detail'];
    public $pimarykey="id";
}
