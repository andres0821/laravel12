<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($data);

        session()->flash('swal', [        
            'position' => 'center',
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La categoría se ha creado correctamente',
            'showConfirmButton' => false,
            'timer' => '1500',
        ]);
        
        return redirect()->route('admin.categories.index');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($data);

        session()->flash('swal', [        
            'position' => 'center',
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La categoría se ha actualizado correctamente',
            'showConfirmButton' => false,
            'timer' => '1500',
        ]);
        
        return redirect()->route('admin.categories.edit', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('swal', [ 
            'title' => '¡Bien hecho!',
            'text' => 'La categoría se ha eliminado correctamente',       
            'icon' => 'success',
        ]);

        return redirect()->route('admin.categories.index');
    }
}
