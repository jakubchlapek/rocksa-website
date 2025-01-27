<div class="flex flex-col w-full gap-[4rem] items-center overflow-hidden">
    <x-nav-bar class="flex justify-center"></x-nav-bar>

    <!-- Main Text Section -->
    <div
        x-data="{ showText: false, showUnderline: false }"
        x-intersect.once="showText = true, setTimeout(() => showUnderline = true, 1500)"
        class="relative flex flex-col items-center justify-center"
    >
        <!-- Main Text -->
        <div
            class="font-bold text-5xl invert text-center opacity-0 translate-y-4 transition-all duration-700 ease-in-out"
            :class="{ 'opacity-100 translate-y-0': showText }"
        >
            Better than women, these rocks smash for free
        </div>
        <!-- Underline expanding from the left -->
        <div
            class="absolute bottom-[-1.5rem] h-[3px] bg-white transition-all duration-700 ease-out"
            :style="showUnderline ? 'width: 100%; left: 0;' : 'width: 0; left: 0;'"
        ></div>
    </div>

    <!-- Image and Rocks Section -->
    <div
        x-data="{ showHand: false, showCards: false }"
        x-init="setTimeout(() => showHand = true, 1000); setTimeout(() => showCards = true, 1500)"
        class="flex justify-start items-start w-full max-w-[85%] mt-3 gap-4 ml-52"
    >
        <!-- Hand Image Section -->
        <div
            class="flex-shrink-0 opacity-0 transition-opacity duration-700 ease-in-out"
            :class="{ 'opacity-100': showHand }"
        >
            <img
                src="{{ asset('static/hand.png') }}"
                alt="Hand holding a rock"
                class="w-auto h-auto max-w-[250px] md:max-w-[300px]"
            >
        </div>

        <!-- Rocks Section -->
        <div class="flex flex-wrap gap-4 ml-[200px]">
            <?php
            $rocks = \App\Models\Rock::take(2)->get(); // Fetch the first two rocks
            ?>
            @foreach ($rocks as $rock)
                <div
                    class="block text-black p-4 rounded-lg shadow-md space-x-5 opacity-0"
                    :class="{ 'opacity-100': showCards }"
                    style="transition: opacity 1s ease-in-out;"
                >
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
