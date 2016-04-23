<?php

namespace College\Http\Controllers;

use Auth;
use College\User;
use College\Http\Requests;

class ExamResultsController extends Controller
{
    public function show($email)
    {
        $student = User::where('type', 'student')->where('email', $email)->first();
        if (empty($student)) {
            abort(404);
        }
        if (Auth::user()->email != $student->email) {
            abort(403);
        }
        
        return view('front.examresults.index')->with('result', $student->result()->first())->with('student', $student);
    }
}
