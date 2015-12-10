<?php

namespace College\Http\Controllers\Admin;

use College\Http\Requests\UserAdditionResponse;
use College\Http\Requests;
use College\Http\Controllers\Controller;
use College\User;
use Validator;


class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    /**
     * Create a new user instance after a valid registration.
     * @return User
     * @internal param array $data
     */
    protected function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserAdditionResponse|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAdditionResponse $request)
    {
        User::create($this->assignData($request->all()));

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserAdditionResponse|\Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserAdditionResponse $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($this->assignData($request->all()));

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function assignData($data)
    {
        return [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'type' => $data['type'],
            'status' => $data['status'],
            'password' => bcrypt($data['password']),
        ];
    }
}
