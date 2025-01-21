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
        return view('rocks.create');
    }

    public function store(StoreRockRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
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
        return view('rocks.edit')->with('rock', $rock);
    }

    public function update(UpdateRockRequest $request, Rock $rock): RedirectResponse
    {
        $rock->update($request->validated());

        return redirect()->route('rocks.show', $rock);
    }

    public function destroy(Rock $rock): RedirectResponse
    {
        $rock->delete();

        return redirect()->route('rocks.index');
    }

}
