<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <x-categories-bar :categories="$categories"></x-categories-bar>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="text-2xl text-gray-900"><b>Category: </b>{{ $category->name }}</a>
                    <p class="mt-2 text-gray-600">{{ $category->description }}</p>

                    <!-- Display subcategories -->
                    @if($subcategories->count() > 0)
                        <div class="grid grid-cols-6 gap-4 my-5">
                            @foreach($subcategories as $subcategory)
                                <button class="inline-flex items-center justify-center py-3 border border-transparent text-2xl leading-4 font-medium rounded-md text-gray-900 bg-gray-100 hover:ring-gray-300 hover:ring-2 hover:text-black hover:outline-none transition ease-in-out duration-150">
                                    <div class="items-center text-center flex justify-center">
                                        <a href="{{ route('categories.show', $subcategory->slug) }}" class="font-semibold text-base">{{ $subcategory->name }}</a>
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
                                'main_image' => $rock->main_image,
                                'name' => $rock->title,
                                'color' => $rock->color,
                                'origin' => $rock->country_of_origin,
                                'properties' => [
                                    'mineral' => $rock->main_mineral,
                                    'weight' => $rock->weight,
                                    'treatment' => $rock->treatment
                                ],
                                'description' => [
                                    'clarity' => $rock->clarity,
                                    'rarity' => $rock->rarity,
                                    'density' => $rock->density,
                                    'toughness' => $rock->toughness,
                                    'extra' => $rock->description
                                ],
                                'price' => $rock->price,
                                'moreImages' => [$rock->image_1, $rock->image_2, $rock->image_3]
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
