<?php

namespace App\Http\Controllers;

use App\School;
use App\Teacher;
use App\Parents;
use App\Student;
use App\SentMessage;
use App\User;
use App\Classes;
use App\StudentLog;
use Auth;

class SchoolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('school');
    }

    public function schoolDashboard($id){
        $school_name = School::where('id', $id)->pluck('school_name')->first();
        $school = User::where('school_id', $id)->get()->count();
        $student = Student::where('school_id', $id)->get()->count();
        $teacher = Teacher::where('school_id', $id)->get()->count();
        $parents = Parents::where('school_id', $id)->get()->count();
        $classes = Classes::where('school_id', $id)->get()->count();
        $message_sent = SentMessage::where('school_id', $id)->get()->count();
        $data = array(
            'school_name' => $school_name,
            'school' => $school,
            'teacher' => $teacher,
            'parents' => $parents,
            'student' => $student,
            'message_sent' => $message_sent,
            'school_id' => $id,
            'classes' => $classes
        );
        return view('schools.index', ['data' => $data]);
    }

    public function schoolSettings($id){
        return view('school.index');
    }

    public function getStudentLogs(){
        $logs = StudentLog::orderBy("id", "DESC")->paginate(10);
        return view('schools.studentsLog', ['data' => $logs]);
    }

    public function getEachStudentLogs($id){
        $arr = [];
        $students = Student::where('school_id', $id)->get();
        foreach($students as $student){
            $logs = StudentLog::where('card_code', $student->card_code)->orderBy("id", "DESC")->paginate(10);
            array_push($arr, $logs);
        }
        if (count($arr) > 0){
            return view('schools.studentsLog', ['data' => $arr[0]]);
        }else{
            return view('schools.studentsLog', ['data' => []]);
        }
    }

    public function getEachSchoolLogs(){
        $arr = [];
        $id = Auth::user()->school_id;
        $students = Student::where('school_id', $id)->get();
        foreach($students as $student){
            $logs = StudentLog::where('card_code', $student->card_code)->orderBy("id", "DESC")->paginate(10);
            array_push($arr, $logs);
        }
        if (count($arr) > 0){
            return view('schools.studentsLog', ['data' => $arr[0]]);
        }else{
            return view('schools.studentsLog', ['data' => []]);
        }
    }
}
