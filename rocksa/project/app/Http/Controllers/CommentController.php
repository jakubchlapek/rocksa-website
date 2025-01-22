<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Rock;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class CommentController extends Controller
{
    public function show(Rock $rock)
    {
        // Fetch the rock and eager load its comments and their children
        $rock->load(['comments' => function ($query) {
            $query->with('children'); // Eager load children (subcomments)
        }]);

        return view('rock.show', compact('rock'));
    }

    public function store(Request $request, Rock $rock): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id', // Walidacja `parent_id`
        ]);

        // Tworzenie nowego obiektu Comment
        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->user_id = auth()->id();
        $comment->rock_id = $rock->id;
        $comment->parent_id = $validated['parent_id'] ?? null;

        // Zapisz obiekt do bazy danych
        $comment->save();

        // Przekierowanie po zapisaniu
        return redirect()->route('rocks.show', $rock)->with('success', 'Comment added successfully!');
    }
}
