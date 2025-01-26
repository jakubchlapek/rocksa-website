<!-- resources/views/categories/index.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Categories</h1>

        <!-- Display categories -->
        <div class="grid grid-cols-3 gap-4">
            @foreach($categories as $category)
                <div class="border rounded-lg p-4">
                    <h2 class="font-semibold text-xl hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">{{ $category->name }}</h2>
                    <a href="{{ route('categories.show', $category->slug) }}" class="text-blue-500 hover:underline">View Subcategories</a>
                </div>
            @endforeach
                <!-- resources/views/rocks/index.blade.php -->
                <x-app-layout>
                    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">All Rocks in Category: {{ $category->name }}</h1>

                        <!-- Display rocks -->
                        @if($rocks->count() > 0)
                            <div class="grid grid-cols-3 gap-4 mt-6">
                                @foreach($rocks as $rock)
                                    <div class="border rounded-lg p-4">
                                        <h3 class="font-semibold text-lg">{{ $rock->title }}</h3>
                                        <p class="text-gray-600">{{ $rock->description }}</p>
                                        <a href="{{ route('rocks.show', $rock->id) }}" class="text-blue-500 hover:underline">View Details</a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="mt-4 text-gray-600">No rocks available in this category.</p>
                        @endif
                    </div>
                </x-app-layout>

        </div>
    </div>
</x-app-layout>
