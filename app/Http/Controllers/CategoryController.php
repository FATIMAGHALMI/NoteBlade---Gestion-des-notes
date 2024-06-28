<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Auth::user()->categories()->paginate(10);
        return view('categories.index', compact('categories'));
    }

   
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->user_id = auth()->id(); // Assign the authenticated user's ID
        $category->name = $request->name;
        $category->save();

        return redirect()->route('dashboard')->with('success', 'Category created successfully.');
    }


   

    public function edit(Category $category)
    {
       
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $category->name = $request->name;
        $category->save();

        return redirect()->route('dashboard')->with('success', 'Category updated successfully.');
    }


   
    public function destroy(Category $category)
    {
        
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Note deleted successfully');
    }


    public function show(Category $category)
{
    // Vérifiez que la catégorie appartient à l'utilisateur authentifié
    if ($category->user_id !== auth()->id()) {
        return abort(403, 'Unauthorized');
    }

    // Charger les notes de la catégorie
    $notes = $category->notes;

    return view('categories.show', compact('category', 'notes'));
}

}
