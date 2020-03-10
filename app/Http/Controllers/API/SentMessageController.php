<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SentMessage;
use Auth;

class SentMessageController extends Controller
{
    //save sent messages
    public function sentMessageLog(Request $request){
      $objects = json_decode($request->getContent(), true);
      $responses = [];
      foreach ($objects as $key => $obj) {
        $message_id = $obj["message_id"];
        $message_delivered = $obj["message_content"];
        $message_isdn = $obj['message_isdn'];
        $student_card_code = $obj['student_card_code'];
        $card_id = $obj['card_id'];
        $message_sent = $obj['message_sent'];
        $school_id = Auth::user()->school_id;
        switch ($message_sent) {
          case 'true':
            $sent = true;
            break;
          default:
            $sent = false;
            break;
        }

        $sentMessage = new SentMessage();
          $sentMessage->message_id = $message_id;
          $sentMessage->message_content = $message_delivered;
          $sentMessage->message_isdn = $message_isdn;
          $sentMessage->student_card_code = $student_card_code;
          $sentMessage->card_id = $card_id;
          $sentMessage->message_sent = $sent;
          $sentMessage->school_id = $school_id;

        if($sentMessage->save()){
          array_push($responses, [
            "message_id" => $message_id,
            "saved"=> true
          ]);
        }else{
          array_push($responses, [
            "message_id" => $message_id,
            "saved"=> false
          ]);
        }
      }
      return json_encode($responses);
  }
}
