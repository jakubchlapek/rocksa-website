<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-categories-bar :categories="$categories"></x-categories-bar>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Card Container -->
                <div class="flex flex-wrap gap-6 p-6 justify-center items-center overflow-visible">
                    @foreach($rocks as $rock)
                        <div class="flex justify-center">
                            @livewire('rock-card', ['data' => [
                                'rockId' => $rock->id,
                                'image' => $rock->main_image,
                                'name' => $rock->title,
                                'color' => $rock->color,
                                'origin' => $rock->country_of_origin,
                                'properties' => 'Mineral: ' . $rock->main_mineral . ',<br>'
                                            . 'Weight: ' . $rock->weight . 'g,<br>'
                                            . 'Treatment: ' . $rock->treatment . '<br>',
                                'description' => implode('<br>', [
                            'Clarity: ' . $rock->clarity . '&emsp;&emsp;Rarity: ' . $rock->rarity,
                            'Density: ' . $rock->density . 'g/cm^3&emsp;&emsp;Toughness: ' . $rock->toughness . ' (in Mohs scale)',
                            $rock->description
                            ]),
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
