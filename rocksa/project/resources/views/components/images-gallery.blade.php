<div class="bg-gray-100 p-6 rounded-lg mt-4">
    <x-input-label class="text-lg font-semibold mb-4 block">More images:</x-input-label>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Main Image -->
        <div class="image-item group">
            <div class="overflow-hidden rounded-lg shadow-md">
                <img src="data:image/{{ pathinfo($rock->main_image ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->main_image ?? '' }}"
                     alt="{{ $rock->main_image ? 'Main Image' : 'Image not chosen!' }}"
                     class="w-full h-auto object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
            </div>
        </div>

        <!-- Image 1 -->
        <div class="image-item group">
            <div class="overflow-hidden rounded-lg shadow-md">
                <img src="data:image/{{ pathinfo($rock->image_1 ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->image_1 ?? '' }}"
                     alt="{{ $rock->image_1 ? 'Image 1' : 'Image not chosen!' }}"
                     class="w-full h-auto object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
            </div>
        </div>

        <!-- Image 2 -->
        <div class="image-item group">
            <div class="overflow-hidden rounded-lg shadow-md">
                <img src="data:image/{{ pathinfo($rock->image_2 ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->image_2 ?? '' }}"
                     alt="{{ $rock->image_2 ? 'Image 2' : 'Image not chosen!' }}"
                     class="w-full h-auto object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
            </div>
        </div>

        <!-- Image 3 -->
        <div class="image-item group">
            <div class="overflow-hidden rounded-lg shadow-md">
                <img src="data:image/{{ pathinfo($rock->image_3 ?? '', PATHINFO_EXTENSION) }};base64,{{ $rock->image_3 ?? '' }}"
                     alt="{{ $rock->image_3 ? 'Image 3' : 'Image not chosen!' }}"
                     class="w-full h-auto object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
            </div>
        </div>
    </div>
</div>
