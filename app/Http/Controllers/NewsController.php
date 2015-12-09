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
        $news = News::all();

        return view('news.list', compact('news'));
    }


    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::findBySlugOrFail($slug);

        return view('news.view', compact('news'));
    }
}
