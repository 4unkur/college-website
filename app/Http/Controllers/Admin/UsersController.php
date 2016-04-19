<?php

namespace College\Http\Controllers\Admin;

use College\Http\Requests\UserAdditionRequest;
use College\Http\Requests;
use College\Http\Controllers\Controller;
use College\User;
use Imageupload;
use File;
use Input;


class UsersController extends Controller
{
    protected $imageInput = 'avatar';

    protected $imagePath = 'avatars';
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
     * @param UserAdditionRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAdditionRequest $request)
    {
        $user = new User();

        foreach (['first_name', 'last_name', 'type', 'email', 'status', 'birth_date', 'phone', 'fb', 'twitter', 'gplus', 'instagram'] as $field) {
            $user->$field = $request->input($field);
        }
        $user->slug = str_slug($request->input('first_name') . '_' . $request->input('last_name'));
        $user->password = bcrypt($request->input('password'));

        if ($request->hasFile('avatar')) {
            $image = Imageupload::upload($request->file('avatar'), null, $this->imagePath);
            $user->avatar = $image['original_filename'];
        }

        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $user->translateOrNew($locale)->education = $request->input('education')[$locale];
            $user->translateOrNew($locale)->job = $request->input('job')[$locale];
            $user->translateOrNew($locale)->bio = $request->input('bio')[$locale];
        }

        $user->save();

        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.users.view', compact('user'));
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
     * @param UserAdditionRequest|\Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserAdditionRequest $request, $id)
    {
        $user = User::findOrFail($id);

        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $user->translateOrNew($locale)->education = $request->input('education')[$locale];
            $user->translateOrNew($locale)->job = $request->input('job')[$locale];
            $user->translateOrNew($locale)->bio = $request->input('bio')[$locale];
        }

        if ($request->hasFile('avatar')) {
            $oldImage = $user->avatar;
            $image = Imageupload::upload($request->file('avatar'), null, $this->imagePath);
            $user->avatar = $image['original_filename'];
            $this->deleteImage($id, $oldImage);
        }

        foreach (['first_name', 'last_name', 'type', 'email', 'status', 'birth_date', 'phone', 'fb', 'twitter', 'gplus', 'instagram'] as $field) {
            $user->$field = $request->input($field);
        }

        if (!($request->input('password') == $user->password || empty($request->input('password')))) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (User::destroy($id)) {
            if ($user->avatar) {
                self::deleteImage(null, $user->avatar);
            }
            return json_encode(true);
        }

        return json_encode(false);
    }

    public function deleteImage($id = null, $image = null)
    {
        $file = isset($image) ? $image : Input::get('path');
        if ($file) {
            $thumbpath = public_path() . '/uploads/images/avatars/' . $file;
            $path = public_path() . '/uploads/images/avatars/square/' . $file;
            File::delete($path);
            File::delete($thumbpath);
        }

        empty($id) || User::where('id', $id)->update(['avatar' => '']);

        return json_encode(true);
    }
}
