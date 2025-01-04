<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        return view('comment.index')->with('comments', Comment::all());
    }

    public function show(Comment $comment): View
    {
        return view('comment.show')->with('comment', $comment);
    }
}
