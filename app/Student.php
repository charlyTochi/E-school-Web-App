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
      'first_name', 'last_name', 'father_id', 'mother_id', 'class_name','card_code','sex', 'date_of_birth', 'nationality', 'religion', 'state_of_origin', 'local_govt' , 'address', 'primary_contact_id', 'primary_contact_rel', 'secondary_contact_id', 'secondary_contact_rel','school_id'
  ];

    // get student details
    public function school(){
      return $this->belongsTo('App\School', "school_id");
    }
}
