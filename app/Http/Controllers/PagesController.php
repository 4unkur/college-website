<?php

namespace College\Http\Controllers;

use College\Page;
use Illuminate\Http\Request;
use College\Http\Requests;
use College\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'active')->first();
        $page || abort(404);

        return view('front.pages.view', compact('page'));
    }

}
