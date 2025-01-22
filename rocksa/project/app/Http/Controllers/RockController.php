<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRockRequest;
use App\Http\Requests\UpdateRockRequest;
use App\Models\Rock;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RockController extends Controller
{
    public function index(): View
    {
        return view('rocks.index')->with('rocks', Rock::where("user_id", auth()->id())->get());
    }

    public function create(): View
    {
        $categories = \App\Models\Category::all(); // Pobierz wszystkie kategorie
        return view('rocks.create', compact('categories'));
    }

    public function store(StoreRockRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->getRealPath();
            $imageBase64 = base64_encode(file_get_contents($imagePath));

            $data['image'] = $imageBase64;
        }
        $rock = Rock::create($data);


        return redirect()->route('rocks.show', $rock);
    }


    public function show(Rock $rock): View
    {
        $ownerId = $rock->user_id;
        $isOwner = false;
        if ($ownerId == auth()->id()) {
            $isOwner = true;
        }
        return view('rocks.show', compact('rock', 'isOwner'));
    }

    public function edit(Rock $rock): View
    {
        $categories = \App\Models\Category::all(); // Pobierz wszystkie kategorie
        return view('rocks.edit', compact('rock', 'categories'));
    }

    public function update(UpdateRockRequest $request, Rock $rock): RedirectResponse
    {
        $this->authorizeUser($rock);
        $rock->update($request->validated());

        return redirect()->route('rocks.show', $rock);
    }

    public function destroy(Rock $rock): RedirectResponse
    {
        $this->authorizeUser($rock);
        $rock->delete();

        return redirect()->route('rocks.index');
    }

    private function authorizeUser(Rock $rock): void
    {
        if ($rock->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }

}
