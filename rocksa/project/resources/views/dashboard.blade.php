<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Categories Bar -->
            <x-categories-bar :categories="$categories"></x-categories-bar>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Card Container -->
                <div class="flex flex-wrap gap-6 p-6 justify-center items-center overflow-visible">
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
            </div>
        </div>
    </div>
</x-app-layout>
