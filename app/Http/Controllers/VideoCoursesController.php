<?php

namespace College\Http\Controllers;

use Illuminate\Http\Request;

use College\Http\Requests;
use College\Http\Controllers\Controller;

class VideoCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'list';
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return 'view' . $slug;
    }
}
