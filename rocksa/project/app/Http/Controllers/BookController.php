<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        return view('rocks.index')->with('rocks', Book::all());
    }

    public function create(): View
    {
        return view('rocks.create');
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $rock = Book::create($request->validated());

        return redirect()->route('rocks.show', $rock);
    }

    public function show(Book $rock): View
    {
        return view('rocks.show')->with('rock', $rock);
    }

    public function edit(Book $rock): View
    {
        return view('rocks.edit')->with('rock', $rock);
    }

    public function update(UpdateBookRequest $request, Book $rock): RedirectResponse
    {
        $rock->update($request->validated());

        return redirect()->route('rocks.show', $rock);
    }

    public function destroy(Book $rock): RedirectResponse
    {
        $rock->delete();

        return redirect()->route('rocks.index');
    }
}
