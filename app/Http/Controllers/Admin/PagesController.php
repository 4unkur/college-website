<?php

namespace College\Http\Controllers\Admin;

use College\Page;
use Illuminate\Http\Request;
use College\Http\Requests;
use College\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.list', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title.ru' => 'required',
            'title.kg' => 'required',
            'status' => 'required',
        ]);

        $page = new Page();
        $page->slug = str_slug($request->input('title')[config('app.fallback_locale')]);
        $page->status = $request->input('status');
        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $page->translateOrNew($locale)->title = $request->input('title')[$locale];
            $page->translateOrNew($locale)->content = $request->input('content')[$locale];
        }
        $page->save();

        return \Redirect::route('admin.page.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        $this->validate($request, [
            'title.ru' => 'required',
            'title.kg' => 'required',
            'status' => 'required',
        ]);

        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $page->translateOrNew($locale)->title = $request->input('title')[$locale];
            $page->translateOrNew($locale)->content = $request->input('content')[$locale];
        }

        $page->status = $request->input('status');
        $page->save();

        return \Redirect::route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Page::destroy($id)) {
            return json_encode(true);
        }

        return json_encode(false);
    }
}
