<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Categories Bar -->
                <div class="bg-gray-100">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex space-x-4 py-3 overflow-x-auto">
                            @foreach($categories as $category)
                                <div class="relative group">
                                    <!-- Main Category -->
                                    <a href="{{ route('categories.show', $category->slug) }}" class="text-gray-800 hover:text-gray-900 px-4 py-2 rounded-md text-sm font-medium">
                                        {{ $category->name }}
                                    </a>

                                    <!-- Subcategories Dropdown -->
                                    @if($category->children->isNotEmpty())
                                        <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md z-10">
                                            <ul class="py-2">
                                                @foreach($category->children as $child)
                                                    <li>
                                                        <a href="{{ route('categories.show', $child->slug) }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                                                            {{ $child->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Dodanie guzika -->
                <div class="mt-4 text-center">
                    <a href="{{ route('carttestlivewire') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Go to Cart Test Livewire
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
