<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Rock;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class CommentController extends Controller
{
    public function show(Comment $comment)
    {
        return view('comment.show')->with('comment', $comment);
    }
    public function store(Request $request, Rock $rock): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        // Tworzenie nowego obiektu Comment
        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->user_id = auth()->id();
        $comment->rock_id = $rock->id;

        // Zapisz obiekt do bazy danych
        $comment->save();

        // Przekierowanie po zapisaniu
        return redirect()->route('rocks.show', $rock)->with('success', 'Comment added successfully!');
    }


}
