<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Parents extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','first_name','last_name', 'email', 'sex', 'school_id', 'phone_number', 'active', 'address', 'acct_id'
    ];


    public function teachers()
      {
          return $this->hasMany('App\Teacher');
      }

    public function students()
      {
          return $this->hasMany('App\Student', 'primary_contact_id');
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
}
