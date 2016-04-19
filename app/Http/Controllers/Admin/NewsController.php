<?php

namespace College\Http\Controllers\Admin;

use Illuminate\Http\Request;
use College\Http\Requests;
use College\Http\Controllers\Controller;
use College\News;
use Imageupload;
use File;
use Input;


class NewsController extends Controller
{
    protected $imageInput = 'image';

    protected $imagePath = 'news';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            'image' => 'required|image',
        ]);

        $news = new News();
        $news->slug = str_slug($request->input('title')[config('app.fallback_locale')]);
        $news->status = $request->input('status');
        $image = Imageupload::upload($request->file('image'), null, $this->imagePath);
        $news->image = $image['original_filename'];
        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $news->translateOrNew($locale)->title = $request->input('title')[$locale];
            $news->translateOrNew($locale)->text = $request->input('text')[$locale];
        }
        $news->save();

        return \Redirect::route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        return view('admin.news.edit', compact('news'));
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
        $news = News::find($id);

        $rules = [
            'title.ru' => 'required',
            'title.kg' => 'required',
            'status' => 'required',
        ];

        if ($request->hasFile('image')) {
            $rules['image']  = 'image';
        }

        $this->validate($request, $rules);

        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $news->translateOrNew($locale)->title = $request->input('title')[$locale];
            $news->translateOrNew($locale)->text = $request->input('text')[$locale];
        }

        if ($request->hasFile('image')) {
            $oldImage = $news->image;
            $image = Imageupload::upload($request->file('image'), null, $this->imagePath);
            $news->image = $image['original_filename'];
            $this->deleteImage($id, $oldImage);
        }

        $news->status = $request->input('status');
        $news->save();

        return \Redirect::route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if (News::destroy($id)) {
            if ($news->image)
            {
                $thumbpath = public_path() . '/uploads/images/news/' . $news->image;
                $path = public_path() . '/uploads/images/news/square/' . $news->image;
                File::delete($path);
                File::delete($thumbpath);
            }
            return json_encode(true);
        }

        return json_encode(false);
    }

    public function deleteImage($id, $image = null)
    {
        $file = isset($image) ? $image : Input::get('path');
        if ($file) {
            $thumbpath = public_path() . '/uploads/images/news/' . $file;
            $path = public_path() . '/uploads/images/news/square/' . $file;
            File::delete($path);
            File::delete($thumbpath);
        }

        News::where('id', $id)->update(['image' => '']);

        return json_encode(true);
    }
}
