<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentLog extends Model
{
  protected $fillable = [
      'card_code', 'log_day', 'log_month', 'log_year', 'log_min', 'log_sec', 'log_hour', 'is_logged_in', 'log_timestamp'
  ];
    //
}
