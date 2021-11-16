<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clockmodel extends Model
{
    //
    protected $table ='clocked_settings';
    protected $fillable =['day','time_checkin','time_checkout','late','absent_work','freetime','type'];
    public $pimarykey="id";

}
