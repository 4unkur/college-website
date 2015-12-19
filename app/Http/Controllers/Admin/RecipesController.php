<?php

namespace College\Http\Controllers\Admin;

use College\Recipe;
use Illuminate\Http\Request;

use College\Http\Requests;
use College\Http\Controllers\Controller;
use Imageupload;

class RecipesController extends Controller
{

    protected $imageInput = 'image';

    protected $imagePath = 'recipes';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        return view('admin.recipes.list', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recipes.create');
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
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',
            'image' => 'required|image',
        ]);

        Recipe::create($request->all());

        Imageupload::upload($request->file('image'), null, $this->imagePath);

        return redirect(route('admin.recipes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('admin.recipes.edit', compact('recipe'));
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
        $recipe = Recipe::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);
        $recipe->update($request->all());

        return redirect(route('admin.recipes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
