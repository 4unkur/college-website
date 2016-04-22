<?php

namespace College\Http\Controllers;

use College\User;
use College\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 'user')->paginate(config('college.users_per_page'));

        return view('front.users.list', compact('users'))->with('list', 'user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->where('status', 'active')->first();

        return view('front.users.view', compact('user'));
    }

    public function staffList()
    {
        $users = User::where('type', 'teacher')->paginate(config('college.users_per_page'));

        return view('front.users.list', compact('users'))->with('list', 'staff');
    }   
    
    public function studentList()
    {
        $users = User::where('type', 'student')->paginate(config('college.users_per_page'));

        return view('front.users.list', compact('users'))->with('list', 'student');
    }
}
