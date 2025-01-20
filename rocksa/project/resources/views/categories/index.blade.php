<!-- resources/views/categories/index.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Categories</h1>

        <!-- Display categories -->
        <div class="grid grid-cols-3 gap-4 mt-6">
            @foreach($categories as $category)
                <div class="border rounded-lg p-4">
                    <h2 class="font-semibold text-xl">{{ $category->name }}</h2>
                    <a href="{{ route('categories.show', $category->slug) }}" class="text-blue-500 hover:underline">View Subcategories</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
