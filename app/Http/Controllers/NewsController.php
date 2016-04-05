<?php

namespace College\Http\Controllers;

use Illuminate\Http\Request;
use College\Http\Requests;
use College\Http\Controllers\Controller;
use College\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(5); //TODO: change it to value of config

        return view('front.news.list', compact('news'));
    }


    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (empty($news)) {
            abort(404);
        }

        return view('front.news.view', compact('news'));
    }
}
