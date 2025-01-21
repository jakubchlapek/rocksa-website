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
        $this->authorizeUser($rock);
        return view('rocks.show')->with('rock', $rock);
    }

    public function edit(Rock $rock): View
    {
        $this->authorizeUser($rock);
        return view('rocks.edit')->with('rock', $rock);
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
