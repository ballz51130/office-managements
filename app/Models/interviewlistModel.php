<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class interviewlistModel extends Model
{
    //
    protected $table ='interviewlists';
    protected $fillable =['registration_id','date','detail','status'];
    public $pimarykey="id";

    public function registrations()
    {
        return $this->belongsTo( registrations::class,'registration_id', 'id' );
    }
    public function history()
    {
      return $this->hasMany(interviewhistoryModel::class, 'interviewlist_id', 'id');
    }
}
