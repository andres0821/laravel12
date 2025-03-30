<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,',
        ]);

        Tag::create($data);

        session()->flash('swal', [        
            'position' => 'center',
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La etiqueta se ha creado correctamente',
            'showConfirmButton' => false,
            'timer' => '1500',
        ]);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
        ]);

        $tag->update($data);

        session()->flash('swal', [        
            'position' => 'center',
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La etiqueta se ha actualizado correctamente',
            'showConfirmButton' => false,
            'timer' => '1500',
        ]);

        return redirect()->route('admin.tags.edit', $tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('swal', [        
            'position' => 'center',
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La etiqueta se ha eliminado correctamente',
            'showConfirmButton' => false,
            'timer' => '1500',
        ]);
        return redirect()->route('admin.tags.index');
    }
}
