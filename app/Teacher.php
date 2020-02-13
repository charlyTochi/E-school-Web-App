<?php

namespace App;
<<<<<<< HEAD
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Teacher extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'school_id', 'phone_number', 'active', 'address', 'class_assigned'
    ];

    public function students()
      {
          return $this->hasMany('App\Student');
      }


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
=======

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'assigned_class_name'
  ];

>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
}
