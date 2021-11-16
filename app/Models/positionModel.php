<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class positionModel extends Model
{
    //
    protected $table ='positions';
    protected $fillable =['name','detail'];
    public $pimarykey="id";
}
