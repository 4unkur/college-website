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
        $blockData = News::where('status', 'active')->orderByRaw("RAND()")->limit(4)->get();

        return view('front.news.list')->with('news', $news)->with('blockData', $blockData);
    }


    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->where('status', 'active')->get();
        $blockData = News::where('status', 'active')->orderByRaw("RAND()")->limit(4)->get();
        $news = $news[0];
        $random = isset($news[1]) ? $news[1] : [];
        if (empty($news)) {
            abort(404);
        }

        return view('front.news.view')->with('news', $news)->with('blockData', $blockData)->with('random', $random);
    }
}
