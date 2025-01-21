<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rock;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('children.rocks')->firstOrFail();

        // Pobierz wszystkie skały z kategorii i jej podkategorii
        $rocks = $this->getAllRocks($category);

        // Pobierz podkategorie (dla wygody wyświetlania)
        $subcategories = $category->children;

        // Zwróć widok z kategorią, skałami i podkategoriami
        return view('categories.show', compact('category', 'rocks', 'subcategories'));
    }
    /**
     * Pobiera wszystkie skały z danej kategorii i jej podkategorii.
     *
     * @param  Category $category
     * @return \Illuminate\Support\Collection
     */
    private function getAllRocks(Category $category)
    {
        $rocks = $category->rocks;

        $subcategoriesRocks = $category->children->flatMap(function ($subcategory) {
            return $this->getAllRocks($subcategory);
        });

        return $rocks->merge($subcategoriesRocks);
    }
}
