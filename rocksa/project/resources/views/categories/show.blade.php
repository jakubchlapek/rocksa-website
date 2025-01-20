<!-- resources/views/categories/show.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $category->name }}</h1>
        <p class="mt-2 text-gray-600">{{ $category->description }}</p>

        <!-- Display subcategories -->
        @if($subcategories->count() > 0)
            <h2 class="text-xl mt-6">Subcategories</h2>
            <div class="grid grid-cols-3 gap-4 mt-4">
                @foreach($subcategories as $subcategory)
                    <div class="border rounded-lg p-4">
                        <h3 class="font-semibold text-lg">{{ $subcategory->name }}</h3>
                        <a href="{{ route('categories.show', $subcategory->slug) }}" class="text-blue-500 hover:underline">View Details</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-4 text-gray-600">No subcategories available for this category.</p>
        @endif
    </div>
</x-app-layout>
