<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class leave_type extends Model
{
    //
    protected $table ='leaves_types';
    protected $fillable =['topic','detail','num_day',];
    public $pimarykey="id";
}
