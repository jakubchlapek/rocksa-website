<?php

namespace App\Http\Controllers;

use App\Models\Rock;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $rocks = Rock::all();
        return view('dashboard', compact('rocks'));
    }
}
