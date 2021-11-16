<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class leaves extends Model
{
    protected $table ='leaves';
    protected $fillable =['leave_id','write_at','date','leave_title','dear','user_id','department',
    'detail','reason','start_date','end_date','days','communication','document','status'];
    public $pimarykey="id";

    public function leaves_type()
    {
        return $this->belongsTo( leave_type::class,'leave_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
