<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class interviewhistoryModel extends Model
{
    //
    protected $table ='interviewhistory';
    protected $fillable =['interviewlist_id','date','detail'];
    public $pimarykey="id";

    public function interviewlists()
    {
        return $this->belongsTo( interviewlistModel::class,'interviewlist_id', 'id' );
    }
}
