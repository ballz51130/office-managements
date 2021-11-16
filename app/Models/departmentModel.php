<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departmentModel extends Model
{
    //
    protected $table ='departments';
    protected $fillable =['name','detail'];
    public $pimarykey="id";
}
