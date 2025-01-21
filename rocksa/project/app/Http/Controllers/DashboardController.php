<?php

namespace App\Http\Controllers;

use App\Models\Rock;
use App\Models\Category;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $rocks = Rock::all();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('dashboard', compact('rocks', 'categories'));
    }
}
