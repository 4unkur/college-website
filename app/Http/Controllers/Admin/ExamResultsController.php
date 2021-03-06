<?php

namespace College\Http\Controllers\Admin;

use College\User;
use File;
use Illuminate\Http\Request;
use College\ExamResult;
use College\Http\Requests;
use College\Http\Controllers\Controller;

class ExamResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examresults = ExamResult::all();

        return view('admin.examresults.list', compact('examresults'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->validate($request, ['csv' => 'required']);
        $file = $request->file('csv');
        if ('csv' != $file->getClientOriginalExtension()) {
            return redirect()->back()->withErrors('incorrect_type');
        }
        $csv = array_map('str_getcsv', file($file->getRealPath()));
        array_shift($csv);
        if ($csv) {
            ExamResult::truncate();
            foreach ($csv as $row) {
                if ($user = User::where('email', $row[0])->first()) {
                    $examresult = new ExamResult();
                    $examresult->student_id = $user->id;
                    $examresult->points = $row[1];
                    $examresult->save();
                }
            }
        }

        return redirect(route('admin.examresult.index'));
    }
}
