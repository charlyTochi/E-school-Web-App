<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'first_name', 'last_name', 'email', 'father_id', 'mother_id', 'password', 'class_name','card_code','sex', 'date_of_birth', 'nationality', 'religion', 'profile_image', 'state_of_origin', 'local_govt' , 'address', 'primary_contact_id', 'primary_contact_rel', 'secondary_contact_id', 'secondary_contact_rel','school_id', 'acct_id', 'class_id'
  ];

    // get student details
    public function school(){
      return $this->belongsTo('App\School', "school_id");
    }
    public function class_name(){
      return $this->belongsTo('App\Classes', "class_id");
    }
}
