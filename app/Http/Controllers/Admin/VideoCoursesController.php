<?php

namespace College\Http\Controllers\Admin;

use File;
use Input;
use College\VideoCourse;
use Illuminate\Http\Request;
use College\Http\Requests;
use College\Http\Controllers\Controller;

class VideoCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videocourses = VideoCourse::all();
        return view('admin.videocourses.list', compact('videocourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videocourses.create');
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
            'description.ru' => 'required',
            'description.kg' => 'required',
            'status' => 'required',
            'video' => 'required',
        ]);

        $videocourse = new VideoCourse();
        $videocourse->slug = str_slug($request->input('title')[config('app.fallback_locale')]);
        $videocourse->status = $request->input('status');
        $youtubeVideoUrl = $this->youtube_url($request->input('video'));
        $videocourse->video = $youtubeVideoUrl ? $youtubeVideoUrl : $request->input('video');

        if ($request->hasFile('files') && count($request->file('files'))) {
            $filenames = [];
            foreach($request->file('files') as $file) {
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $filenames[] = $filename;
            }
            $videocourse->files = serialize($filenames);
        }

        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $videocourse->translateOrNew($locale)->title = $request->input('title')[$locale];
            $videocourse->translateOrNew($locale)->description = $request->input('description')[$locale];
        }
        $videocourse->save();

        return redirect(route('admin.videocourse.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videocourse = VideoCourse::findOrFail($id);

        return view('admin.videocourses.edit', compact('videocourse'));
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
        $videocourse = VideoCourse::findOrFail($id);
        $this->validate($request, [
            'title.ru' => 'required',
            'title.kg' => 'required',
            'description.ru' => 'required',
            'description.kg' => 'required',
            'status' => 'required',
            'video' => 'required',
        ]);

        $videocourse->status = $request->input('status');
        $youtubeVideoUrl = $this->youtube_url($request->input('video'));
        $videocourse->video = $youtubeVideoUrl ? $youtubeVideoUrl : $request->input('video');

        if ($request->hasFile('files') && count($request->file('files'))) {
            $filenames = $videocourse->files;
            $filenames = $filenames ? unserialize($filenames) : [];
            foreach($request->file('files') as $file) {
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $filenames[] = $filename;
            }
            $videocourse->files = serialize($filenames);
        }

        foreach (config('laravellocalization.supportedLocales') as $locale => $language)
        {
            $videocourse->translateOrNew($locale)->title = $request->input('title')[$locale];
            $videocourse->translateOrNew($locale)->description = $request->input('description')[$locale];
        }
        $videocourse->save();

        return redirect(route('admin.videocourse.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videocourse = VideoCourse::findOrFail($id);
        if ($videocourse) {
            if ($videocourse->files) {
                $this->deleteFile($id, true);
            }
            VideoCourse::destroy($id);

            return json_encode(true);
        }

        return json_encode(false);
    }

    private function youtube_url($url) {
        $pattern = '%^(?:https?://)?(?:www\.)?(?:youtu\.be/| youtube\.com(?:/embed/| /v/| /watch\?v=))([\w-]{10,12})$%x';

        $result = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }
        return '';
    }

    public function deleteFile($id, $all = false)
    {
        $path = Input::get('path');

        $videcourse = VideoCourse::findOrFail($id);
        $files = unserialize($videcourse['files']);

        if ($all && $files) {
            foreach($files as $file) {
                File::delete(public_path() . '/uploads/' . $file);
            }
            $videcourse->files = '';

            return json_encode(true);
        }
        elseif (isset($path) && $path) {
            File::delete(public_path() .  '/uploads/' . $path);
            if(($key = array_search($path, $files)) !== false) {
                unset($files[$key]);
            }
            $videcourse->files = serialize($files);
            $videcourse->save();

            return json_encode(true);
        }

        return json_encode(false);
    }
}
