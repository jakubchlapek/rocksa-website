<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rock;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();

        return view('categories.index', compact('categories'));
    }
    /**
     * Show the details of a specific category along with its subcategories.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $category = Category::whereNull('parent_id')->with('children')->get();
        $rocks = $category->rocks;
        $subcategories = $category->children;

        // Zwracamy widok z kategorią i jej podkategoriami
        return view('categories.show', compact('category', 'rocks', 'subcategories'));
    }
}
