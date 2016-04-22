<?php

namespace College\Http\Controllers;

use College\Http\Requests;
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
        $news = News::where('status', 'active')->orderBy('created_at', 'desc')->paginate(config('college.news_per_page'));

        return view('front.news.list')->with('news', $news);
    }


    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->where('status', 'active')->first();
        if (empty($news)) {
            abort(404);
        }

        return view('front.news.view')->with('news', $news);
    }
}
