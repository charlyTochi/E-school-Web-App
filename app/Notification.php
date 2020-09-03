<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 'content', 'school_id', 'type', 'status', 'sender_id', 'reciever_id', 'reciever_acct_type', 'sender_acct_type'
];
}
