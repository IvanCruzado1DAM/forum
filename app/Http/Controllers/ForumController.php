<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::with(['posts', 'replies'])->paginate(2);
       //dd($forums);
       return view('foros.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:100|unique:forums', // forums es la tabla dónde debe ser único
            'description' => 'required|max:500',
        ],
        [
            'name.required' => __("El campo NAME es requerido!!!")            
        ]);        
        Forum::create(request()->all());
		// La siguiente línea nos devuelve a la url anterior (si es que existe), o a la raíz
		// y manda un mensaje, mediante una sesión flash, de éxito
		return back()->with('message', ['success', __("Foro creado correctamente")]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        $posts = $forum->posts()->with(['owner'])->paginate(2);
        //dd($posts);
        return view('foros.detail', compact('forum','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
