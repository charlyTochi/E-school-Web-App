<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentMessage extends Model
{
    //
    protected $fillable = [
        "message_id", "message_content", "message_isdn", "student_card_code", "card_id", "message_sent"
    ];
}
