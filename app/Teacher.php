<?php

namespace App;

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

}
