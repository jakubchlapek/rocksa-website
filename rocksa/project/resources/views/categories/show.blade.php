<x-app-layout>
    <div class="py-12">
        @livewire('cart')
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <x-categories-bar :categories="$categories"></x-categories-bar>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="text-2xl text-gray-900"><b>Category: </b>{{ $category->name }}</a>
                    <p class="mt-2 text-gray-600">{{ $category->description }}</p>

                    <!-- Display subcategories -->
                    @if($subcategories->count() > 0)
                        <div class="grid grid-cols-4 gap-4 mt-6 px-20">
                            @foreach($subcategories as $subcategory)
                                <button class="inline-flex items-center justify-center py-3 border border-transparent text-2xl leading-4 font-medium rounded-md text-gray-900 bg-gray-100 focus:border-blue-300 focus:border-2 hover:text-black focus:outline-none transition ease-in-out duration-150">
                                    <div class="items-center text-center flex justify-center">
                                        <a href="{{ route('categories.show', $subcategory->slug) }}" class="font-semibold text-lg">{{ $subcategory->name }}</a>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    @else
                        <p class="mt-4 text-gray-600">No subcategories available for this category.</p>
                    @endif

                    <!-- Display rocks in this category -->
                    @if($rocks->isEmpty())
                        <p>There are no rocks in the database.</p>
                    @else
                        <div class="flex flex-wrap gap-6 p-6 justify-center items-center overflow-visible mt-3">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
