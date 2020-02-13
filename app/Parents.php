<?php

namespace App;
<<<<<<< HEAD
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Parents extends Authenticatable
{
    use Notifiable, HasApiTokens;
=======

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Parents extends Authenticatable{

use HasApiTokens, Notifiable;
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'title','first_name','last_name', 'email', 'sex', 'school_id', 'phone_number', 'active', 'address'
    ];


    public function teachers()
      {
          return $this->hasMany('App\Teacher');
      }

    public function students()
      {
          return $this->hasMany('App\Student', 'primary_contact_id');
      }


=======
        'name', 'email', 'password','activation_token','relationship', 'school_id','user_category'
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
        'password', 'remember_token', 'activation_token'
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
