<!-- Categories Bar -->
<div class="bg-gray-100 shadow-sm sm:rounded-lg mb-5 overflow-visible font-bold text-center items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-4 p-5 justify-center">
            @foreach($categories as $category)
                <div class="relative group">
                    <!-- Main Category -->
                    <a href="{{ route('categories.show', $category->slug) }}"
                       class="text-gray-800 hover:text-black px-4 py-2 rounded-md p-2 group-hover:bg-gray-200 focus:outline-none transition ease-in-out duration-150">
                        {{ $category->name }}
                    </a>

                    <!-- Subcategories Dropdown -->
                    @if($category->children->isNotEmpty())
                        <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md z-10 min-w-[200px]">
                            <ul class="py-2">
                                @foreach($category->children as $child)
                                    <li>
                                        <a href="{{ route('categories.show', $child->slug) }}"
                                           class="block px-6 py-3 text-base text-gray-800 hover:bg-gray-100 transition ease-in-out duration-150">
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
