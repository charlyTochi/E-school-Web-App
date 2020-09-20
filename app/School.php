<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class School extends Model
{
  use Notifiable, HasApiTokens;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'school_name', 'email', 'phone_number', 'address', 'motto', 'acct_id'
  ];

  public function students()
    {
        return $this->hasMany('App\Student');
    }

  public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

  public function parents()
    {
        return $this->hasMany('App\Parents');
    }    
  public function class_id()
  {
        return $this->hasMany('App\Classes');
  }
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      // 'password', 'remember_token',
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
