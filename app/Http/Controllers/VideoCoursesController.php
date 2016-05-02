<?php

namespace College\Http\Controllers;

use College\VideoCourse;
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
        $videocourses = VideoCourse::where('status', 'active')->paginate(config('college.news_per_page'));
        
        return view('front.videocourses.list', compact('videocourses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $videocourse = VideoCourse::where('status', 'active')->where('slug', $slug)->first();

        return view('front.videocourses.view', compact('videocourse'));
    }
}
