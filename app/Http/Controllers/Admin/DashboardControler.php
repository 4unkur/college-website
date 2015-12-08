<?php

namespace College\Http\Controllers\Admin;

use Illuminate\Http\Request;
use College\Http\Requests;
use College\Http\Controllers\Controller;

class DashboardControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
