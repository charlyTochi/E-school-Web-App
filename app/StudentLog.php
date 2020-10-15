<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class StudentLog extends Authenticatable
{
  use Notifiable, HasApiTokens;
  
  protected $fillable = [
      'card_code', 'school_id', 'log_day', 'log_month', 'log_year', 'log_min', 'log_sec', 'log_hour', 'is_logged_in', 'log_timestamp'
  ];
    //
}
