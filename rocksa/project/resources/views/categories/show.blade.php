<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <x-categories-bar :categories="$categories"></x-categories-bar>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="text-2xl text-gray-900"><b>Category: </b>{{ $category->name }}</a>
                    <p class="mt-2 text-gray-600">{{ $category->description }}</p>

                    <!-- Display subcategories -->
                    @if($subcategories->count() > 0)
                        <div class="grid grid-cols-4 gap-4 mt-4">
                            @foreach($subcategories as $subcategory)
                                <div class="border rounded-lg p-4 items-center text-center bg-gray-200 flex justify-center">
                                    <a href="{{ route('categories.show', $subcategory->slug) }}" class="font-semibold text-lg">{{ $subcategory->name }}</a>
                                </div>
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
