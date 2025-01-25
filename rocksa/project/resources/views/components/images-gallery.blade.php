<div class="bg-gray-100 p-4 rounded-lg mt-2">
    <x-input-label class="mb-2">Current images gallery: </x-input-label>
<div class="grid grid-cols-4 gap-4">
    <!-- Main Image -->
    <div class="image-item">

        <img src="data:image/{{ pathinfo($rock->main_image ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->main_image ?? '' }}"
             alt="{{ $rock->main_image ? 'Main Image' : 'Image not chosen!' }}"
             class="w-full h-auto object-cover">
        <p class="text-center mt-2">Main Image</p>
    </div>

    <!-- Image 1 -->
    <div class="image-item">
        <img src="data:image/{{ pathinfo($rock->image_1 ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->image_1 ?? '' }}"
             alt="{{ $rock->image_1 ? 'Image 1' : 'Image not chosen!' }}"
             class="w-full h-auto object-cover">
        <p class="text-center mt-2">Image 1</p>
    </div>

    <!-- Image 2 -->
    <div class="image-item">
        <img src="data:image/{{ pathinfo($rock->image_2 ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->image_2 ?? '' }}"
             alt="{{ $rock->image_2 ? 'Image 2' : 'Image not chosen!' }}"
             class="w-full h-auto object-cover">
        <p class="text-center mt-2">Image 2</p>
    </div>

    <!-- Image 3 -->
    <div class="image-item">
        <img src="data:image/{{ pathinfo($rock->image_3 ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->image_3 ?? '' }}"
             alt="{{ $rock->image_3 ? 'Image 3' : 'Image not chosen!' }}"
             class="w-full h-auto object-cover">
        <p class="text-center mt-2">Image 3</p>
    </div>
</div>
</div>
