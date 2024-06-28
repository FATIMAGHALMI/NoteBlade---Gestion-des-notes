<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\Category;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('user_id', auth()->id())->get();
        
        $notes = collect([]);
        $search = $request->input('search');

        if ($search) {
            $notes = Note::where('user_id', auth()->id())
                ->where(function ($query) use ($search) {
                    $query->where('titre', 'LIKE', "%{$search}%")
                          ->orWhere('content', 'LIKE', "%{$search}%");
                })->get();
        }

        return view('notes.index', compact('notes', 'categories', 'search'));
    }
    
    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->get();
        return view('notes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Note::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'titre' => $request->title, 
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note créée avec succès!');
    }

    public function destroy(Note $note)
    {
        if ($note->user_id == Auth::id()) {
            $note->delete();
            return redirect()->route('notes.index')->with('success', 'Note deleted successfully');
        } else {
            return redirect()->route('notes.index')->with('error', 'Unauthorized action');
        }
    }

    public function edit(Note $note)
    {
        if ($note->user_id == Auth::id()) {
            $categories = Category::where('user_id', auth()->id())->get();
            return view('notes.edit', compact('note', 'categories'));
        } else {
            return redirect()->route('notes.index')->with('error', 'Unauthorized action');
        }
    }

    public function update(Request $request, Note $note)
    {
        if ($note->user_id == Auth::id()) {
            $request->validate([
                'titre' => 'required|string|max:255',
                'content' => 'required|string',
                'category_id' => 'required|exists:categories,id'
            ]);

            $note->update([
                'category_id' => $request->category_id,
                'titre' => $request->titre,
                'content' => $request->content,
            ]);

            return redirect()->route('notes.index')->with('success', 'Note updated successfully');
        } else {
            return redirect()->route('notes.index')->with('error', 'Unauthorized action');
        }
    }
    public function show(Note $note)
    {
        
        if ($note->user_id !== auth()->id()) {
            return abort(403, 'Unauthorized');
        }

        return view('notes.show', compact('note'));
    }
    // public function search(Request $request)
    // {
    //     $search = $request->input('search');

    //     $notes = Note::where('user_id', auth()->id())
    //         ->where(function ($query) use ($search) {
    //             $query->where('titre', 'like', "%$search%")
    //                   ->orWhere('content', 'like', "%$search%");
    //         })
    //         ->get();

    //     return view('notes.index', compact('notes'));
    // }

    
    

}
