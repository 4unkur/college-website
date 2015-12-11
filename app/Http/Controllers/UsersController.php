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
        $users = User::paginate(20);

        return view('users.list', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {echo $id;
        $user = User::findOrFail($id);

        return view('users.view', compact('user'));
    }
}
