<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\School;
use App\Student;
use App\Notification;
use App\Parents;
use App\Teacher;
use App\Account;
use App\Traits\Utilities;
use App\Traits\Validate;
use Auth;

class NotifController extends Controller
{
    use Validate;

    function sendNotif(Request $request){
        // pacck all message and save to database
        $rules = array(
            'title' => 'required|string',
            'content' => 'required|string',
            'type' => 'required|string',
            'sender_id' => 'required',
            'reciever_id' => 'required',
            'school_id' => 'required',
            'reciever_acct_type' => 'required',
            'sender_acct_type' => 'required',
      );
      $this->validator($rules, $request);
      if($request->reciever_acct_type == 3 ){
          $reciever_acct_type ="Parent";
      }else{
          $reciever_acct_type = "Teacher";
      }
      if($request->sender_acct_type == 3 ){
        $sender_acct_type ="Parent";
        }else{
            $sender_acct_type = "Teacher";
        }
      $notif = new Notification([
          'title'=> $request->title,
          'content' => $request->content,
          'type' => $request->type,
          'sender_id' => $request->sender_id,
          'reciever_id' => $request->reciever_id,
          'school_id' => $request->school_id,
          'reciever_acct_type' => $reciever_acct_type,
          'sender_acct_type' => $sender_acct_type
      ]);
      $notif->save();
      return response()->json(['message' => 'Message Sent successfuly'], 200);
    }

    function recieveNotif($reciever_acct_type, $reciever_id, $school_id){
        // if($acct_type == "Parents"){
            $notif = Notification::where('reciever_id', $reciever_id)
                                ->where('school_id', $school_id)
                                ->where('status', true)
                                ->where('reciever_acct_type', $reciever_acct_type )->get();
            return response()->json(['message' => 'Message recieved',
                                     'notification'=> $notif
                                ], 400);

        
    }

    function unreadNotif($reciever_acct_type, $reciever_id, $school_id){
        $notif = Notification::where('reciever_id', $reciever_id)
        ->where('school_id', $school_id)
        ->where('status', false)
        ->where('reciever_acct_type', $reciever_acct_type )->get();
        return response()->json(['message' => 'Unread Notification',
             'notification'=> $notif
        ], 400);
    }

    function readNotif($notif_id){
        $notif = Notification::find($notif_id)->first();
        $notif->status = 1;
        $notif->save();
        return response()->json(['message' => 'Notifcation read',
             'notification'=> $notif
        ], 400);
    }

    function sentNotif($sender_acct_type, $sender_id, $school_id){
        $notif = Notification::where('sender_id', $sender_id)
        ->where('school_id', $school_id)
        ->where('sender_acct_type', $sender_acct_type )->get();
        return response()->json(['message' => 'Notifcation read',
             'notification'=> $notif
        ], 400);
    }
}
