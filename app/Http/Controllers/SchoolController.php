<?php

namespace App\Http\Controllers;

use App\School;
use App\Teacher;
use App\Parents;
use App\Student;
use App\SentMessage;
use App\User;

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
        $message_sent = SentMessage::where('school_id', $id)->get()->count();

        // $request->session()->put('school_name', $school_name);
        $data = array(
            'school_name' => $school_name,
            'school' => $school,
            'teacher' => $teacher,
            'parents' => $parents,
            'student' => $student,
            'message_sent' => $message_sent,
            'school_id' => $id
        );
        return view('schools.index', ['data' => $data]);
    }
}
