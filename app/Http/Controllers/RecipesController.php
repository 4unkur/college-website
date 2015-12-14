<?php

namespace College\Http\Controllers;

use College\Recipe;
use Illuminate\Http\Request;

use College\Http\Requests;
use College\Http\Controllers\Controller;

class RecipesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::paginate(5);

        return view('recipes.list', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'status' => config('college.recipe_statuses.approval'),
            'user_id' => \Auth::id(),
        ]);

        $recipe->save();

        return redirect(route('recipe.show', $recipe->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $recipe = Recipe::findBySlugOrFail($slug);

        return view('recipes.view', compact('recipe'));
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
        if (!(\Auth::id() == $recipe->user_id)) {
            abort(403);
        }

        return view('recipes.edit', compact('recipe'));
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
        if (!(\Auth::id() == $recipe->user_id)) {
            abort(403);
        }
        $recipe->update($request->all());

        return redirect(route('recipe.show', $recipe->slug));
    }
}
