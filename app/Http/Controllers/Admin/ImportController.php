<?php

namespace College\Http\Controllers\Admin;

use Illuminate\Http\Request;
use College\Import;
use College\Http\Requests;
use College\Http\Controllers\Controller;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.import.list');
    }

    public function examresult()
    {
        return view('admin.examresults.import');
    }

    public function user()
    {
        return view('admin.users.import');
    }
}
