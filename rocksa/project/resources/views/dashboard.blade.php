<x-app-layout>
    @livewire('cart')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Categories Bar -->
            <div class="bg-gray-100 shadow-sm sm:rounded-lg mb-[2rem] overflow-visible font-bold text-center items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex space-x-4 py-3">
                        @foreach($categories as $category)
                            <div class="relative group">
                                <!-- Main Category -->
                                <a href="{{ route('categories.show', $category->slug) }}" class="text-gray-800 hover:text-gray-900 px-4 py-2 rounded-md ">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Card Container -->
                <div class="flex flex-wrap gap-6 p-6 justify-center items-center overflow-visible">
                    @foreach($rocks as $rock)
                        <div class="flex justify-center">
                            @livewire('rock-card', ['data' => [
                                'rockId' => $rock->id,
                                'image' => '/static/amethyst.jpg',
                                'name' => $rock->title,
                                'color' => $rock->color,
                                'origin' => $rock->country_of_origin,
                                'properties' => 'Mineral: ' . $rock->main_mineral . ',<br>'
                                            . 'Weight: ' . $rock->weight . 'g,<br>'
                                            . 'Treatment: ' . $rock->treatment . '<br>',
                                'description' => 'Clarity: ' . $rock->clarity . '&emsp;&emsp;'
                                            . 'Rarity: ' . $rock->rarity . '<br>'
                                            . 'Density: ' . $rock->density . 'g/cm^3&emsp;&emsp;'
                                            . 'Toughness: ' . $rock->toughness . ' (in Mohs scale)<br>'
                                            . $rock->description,
                                'price' => $rock->price,
                                'moreImages' => ['/static/amethyst.jpg', '/static/amethyst1.jpg', '/static/amethyst2.jpg']
                            ]])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
