<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class jobsModel extends Model
{


   protected $table ='jobs_applications';
   protected $fillable =['name','subtitle','salary','position','quantity','times','start','start_time','end','end_time','type','status'];
   public $pimarykey="id";


   public function jobs_property()
    {
      return $this->hasMany(jobs_propertyModel::class, 'job_id', 'id');
    }
    public function jobs_welfare()
    {
      return $this->hasMany(jobs_welfareModel::class, 'job_id', 'id');
    }

}



