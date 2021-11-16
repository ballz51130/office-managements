<?php

namespace App;
use App\Models\departmentModel;
use App\Models\positionModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username','title_name','id_card','brithday','password',
        'phone','image','house_number','road','district','amphures','province','zipcode',
        'identification_card',
        'house_registration',
        'etc','type',
        'status','dep_id','pos_id',
        'salary','salary_type','name_bank','number_bank',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function department()
    {
        return $this->belongsTo( departmentModel::class, 'dep_id' );
    }
    public function position()
    {
        return $this->belongsTo( positionModel::class, 'pos_id' );
    }
    
    public function leaves()
    {
        return $this->belongsTo( 'App\Models\leave', 'id','user_id' );
    }
    // public function role()
    // {
    //     return $this->belongsToMany( Role::class, 'user_roles', 'role_id', 'user_id' );
    // }


    // public function docs()
    // {
    //     return $this->hasMany( UserDoc::class, 'user_id' );
    // }

}
