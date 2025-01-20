<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rock;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->get();
        $rocks = $categories->children->rocks;

        return view('categories.index', compact('categories', 'rocks'));
    }
    /**
     * Show the details of a specific category along with its subcategories.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $rocks = $category->rocks;
        $subcategories = $category->children;

        // Zwracamy widok z kategorią i jej podkategoriami
        return view('categories.show', compact('category','rocks', 'subcategories'));
    }
}
