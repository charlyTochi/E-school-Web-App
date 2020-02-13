<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SentMessage;

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

        $sentMessage = new SentMessage([
          'message_id'=>$message_id,
          'message_content'=>$message_delivered,
          'message_isdn'=>$message_isdn,
          'student_card_code'=>$student_card_code,
          'card_id'=>$card_id,
          'message_sent'=>$message_sent,
        ]);
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
