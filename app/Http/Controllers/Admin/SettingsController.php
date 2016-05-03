<?php

namespace College\Http\Controllers\Admin;

use Setting;
use Illuminate\Http\Request;

use College\Http\Requests;
use College\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.list', compact('settings'));
    }

    
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            '_token' == $key || Setting::set($key, $value);
        }
        Setting::save();

        return redirect(route('admin.settings.index'));
    }
}
