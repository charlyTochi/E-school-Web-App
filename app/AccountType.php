<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
      /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'account_name','permission', 'description'
];
}
