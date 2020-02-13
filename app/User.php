<?php

namespace App;
<<<<<<< HEAD
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

=======

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable{

use HasApiTokens, Notifiable, softDeletes;

protected $dates = ['deleted_at'];
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password', 'school_id', 'external_table_id', 'user_category'
    ];

    // public function school()
    //   {
    //       return $this->belongsTo('App\School');
    //   }
=======
        'name', 'email', 'password','active', 'activation_token','user_category','external_table_id'
    ];

>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
<<<<<<< HEAD
        'password', 'remember_token',
=======
        'password', 'remember_token','activation_token'
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
