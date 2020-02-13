<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Str;
use App\Mail\TestEmail;
use Mail;
use App\Student;
use App\Parents;
use App\School;
use App\StudentLog;
Use \Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

class StudentController extends Controller
{
    //fetch student Data with the student card_number   //saveStudentlog
    public function saveStudentLog(Request $request){
      $objects = json_decode($request->getContent(), true);
      $responses = [];
      foreach ($objects as $key => $obj) {
        $card_code = $obj["card_code"];
        $timestamp = $obj["timestamp"];
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $hour = date('H');
        $min = date('i');
        $sec = date('s');
        $student = Student::where('card_code', $card_code)->first();//this finds the student with similar code of the cardcode tapped
        if($student){
          // student exists
          $student_school_name_query = School::where('id', Auth::user()->external_table_id)->first();//this relates the  id of the school with the school id of the student
          if($student_school_name_query){
          $student_school = $student_school_name_query->school_name;//this gets the name of the school in accordance with the details of the relationship of the school id of in the student database
          $school_mail = $student_school_name_query->email;
          $student_name = $student->lastname." ".$student->firstname;//this gets the first and lastname of the student when card is tapped
          $data = $this->getParentData($student->primary_contact_id, $student->secondary_contact_id);

          $phone_number = $data['phone_number'];
          $addressFrom = $school_mail;
          $addressTo = $data['email'];
          $parent_name = $data['parent_name'];
          $subject = 'School Notification';
          $name =$student_school;

          $user = Auth::user();

          $msgSent = true; // remove this later

          $school_id = Auth::user()->external_table_id;// id of the logged in school
          if ($school_id === $student_school_name_query->id) {
            $studentLog = StudentLog::where('card_code', $card_code)->where('log_year', $year)->where('log_month', $month)->where('log_day', $day)->orderBy('id', 'DESC')->first();
            $message = [
              "title" => "Student Attendance Notification",
              "receiver_phone" => $phone_number,
              "receiver_name" => $parent_name,
              "message_id" => uniqid()

            ];
              if ($studentLog) {
                if ($studentLog->is_logged_in) {
                  $log = false;
                  $studentLog = new StudentLog([
                    'log_year'=>$year,
                    'log_day'=>$day,
                    'log_month'=>$month,
                    'log_min'=>$min,
                    'log_sec'=>$sec,
                    'log_hour'=>$hour,
                    'log_timestamp' => $timestamp,
                    'is_logged_in'=> false,
                    'card_code' => $card_code
                  ]);
                  $studentLog->save();
                  // logout message send
                  //   $data = ['message' => $this->message($log, $student_school, $student_name, $timestamp), 'subject'=> $subject, 'address'=> $addressFrom, 'name' => $name, 'parent_name' => $parent_name];
                  // $msgSent = Mail::to($addressTo)->send(new TestEmail($data));
                  if ($msgSent) {
                    array_push($responses, [
                      "payload" => $obj,
                       "response" => "200",
                       "success"=> "Student successfully logged out",
                       "studentData" => $student,
                       "message" => $message,
                       "studentName"=>$student_name,
                       "studentSchoolName"=>$student_school,
                       "log" => $studentLog,
                       "sent" => $msgSent
                     ]);
                  }else {
                    array_push($responses, [
                      "payload" => $obj,
                       "response" => "500",
                       "success"=> "Error sending mail or text message",
                     ]);
                  }
                }else{
                  $log = true;
                  $studentLog = new StudentLog([
                    'log_year'=>$year,
                    'log_day'=>$day,
                    'log_month'=>$month,
                    'log_min'=>$min,
                    'log_sec'=>$sec,
                    'log_hour'=>$hour,
                    'log_timestamp' => $timestamp,
                    'is_logged_in'=> true,
                    'card_code' => $card_code
                  ]);
                  $studentLog->save();
                  // login message send
                  // get the sstudent details that would be used to send smsSender
                  //   $data = ['message' => $this->message($log, $student_school, $student_name, $timestamp), 'subject'=> $subject, 'address'=> $addressFrom, 'name' => $name, 'parent_name' => $parent_name];
                  // $msgSent = Mail::to($addressTo)->send(new TestEmail($data));
                  if ($msgSent) {
                    array_push($responses, [
                      "payload" => $obj,
                       "response" => "200",
                       "success"=> "Student successfully logged in",
                       "studentData" => $student,
                       "message" => $message,
                       "studentName"=>$student_name,
                       "studentSchoolName"=>$student_school,
                       "log" => $studentLog,
                       "sent" => $msgSent
                     ]);
                  }
                }
              }else{
                $log = "first log";
                $studentLog = new StudentLog([
                  'log_year'=>$year,
                  'log_day'=>$day,
                  'log_month'=>$month,
                  'log_min'=>$min,
                  'log_sec'=>$sec,
                  'log_hour'=>$hour,
                  'log_timestamp' => $timestamp,
                  'is_logged_in'=> true,
                  'card_code' => $card_code
                ]);
                $studentLog->save();
                 // login first time message send
                // $data = ['message' => $this->message($log, $student_school, $student_name, $timestamp), 'subject'=> $subject, 'address'=> $addressFrom, 'name' => $name, 'parent_name' => $parent_name];
                // $msgSent = Mail::to($addressTo)->send(new TestEmail($data));
                if ($msgSent) {
                  array_push($responses, [
                    "payload" => $obj,
                    "studentData" => $student,
                    "success"=> "Student successfully logged in",
                    "message" => $message,
                     "response" => "200",
                     "log" => $studentLog,
                     "sent" => $msgSent
                   ]);
                }
              }
          }else{
            array_push($responses, [
              "payload" => $obj,
              "response" => "500",
              "error"=> $student->firstname." Does not belong to ". $student_school,
            ]);
          }
        }else{
              // invalid school
              array_push($responses, [
                "payload" => $obj,
                "response" => "500",
                "error"=> "Student does not belong to any school"
              ]);
          }
        }else{
          // student doesn't exist
          array_push($responses, [
            "payload" => $obj,
            "response" => "500",
            "error"=> "Student with card number ". $card_code ." does not exist"
          ]);
        }
      }
      return json_encode($responses);
  }

public function getParentData($pri_contact_id, $sec_contact_id){
  if ($pri_contact_id != null) {
    $parent = Parents::where('id', $pri_contact_id)->first();//check if the condition is not met ...that should be accounted for
    if($parent){
      $phone_number = $parent->phone_number;
      $email = $parent->email;
      $parent_name = $parent->parent_name;
      $data = array('phone_number' => $phone_number, 'email' => $email, 'parent_name'=> $parent_name);
    }else {
      $data = null;
    }
    return $data;

  }else{
    $parent = Parents::find($sec_contact_id);//check if the condition is not met ...that should be accounted for
    if ($parent) {
      $phone_number = $parent->phone_number;
      $email = $parent->email;
      $parent_name = $parent->parent_name;
      $data = array('phone_number' => $phone_number, 'email' => $email, 'parent_name'=> $parent_name);
    }else{
      $data = null;
    }
    return $data;
  }
}

public function message($log, $student_school, $student_name, $timestamp){
  $message = '';
  if ($log == "first log") {
    $message = $student_school. "\n" ."Hi, just to inform you that ".$student_name." arrived school at about ".$timestamp;
    return $message;
  }elseif ($log) {
    $message = $student_school. "\n"."Hi, just to inform you that ".$student_name." is back to school again ".$timestamp;
    return $message;
  }else{
    $message = $student_school. "\n"."Hi, just to inform you that ".$student_name." left school at about ".$timestamp;
    return $message;
  }
}

}
