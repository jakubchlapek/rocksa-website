<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function index()
{
    $categories = Category::where('parent_id', null)->with('children')->get();

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
        $category = Category::where('slug', $slug)->firstOrFail();

        // Pobieramy podkategorie danej kategorii
        $subcategories = $category->children()->get();

        // Zwracamy widok z kategorią i jej podkategoriami
        return view('categories.show', compact('category', 'subcategories'));
    }
}

