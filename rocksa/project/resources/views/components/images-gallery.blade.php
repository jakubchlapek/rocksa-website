<div x-data="{
        fullScreenImage: null
    }"
     class="bg-gray-100 p-6 rounded-lg mt-4">
    <x-input-label class="text-lg font-semibold mb-4 block">More images:</x-input-label>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Main Image -->
        @if($rock->main_image)
            <div class="image-item group">
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="data:image/{{ pathinfo($rock->main_image, PATHINFO_EXTENSION) }};base64,{{ $rock->main_image }}"
                         alt="Main Image"
                         @click="fullScreenImage = 'data:image/{{ pathinfo($rock->main_image, PATHINFO_EXTENSION) }};base64,{{ $rock->main_image }}'"
                         class="w-full h-[200px] object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 cursor-pointer">
                </div>
            </div>
        @endif

        <!-- Image 1 -->
        @if($rock->image_1)
            <div class="image-item group">
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="data:image/{{ pathinfo($rock->image_1, PATHINFO_EXTENSION) }};base64,{{ $rock->image_1 }}"
                         alt="Image 1"
                         @click="fullScreenImage = 'data:image/{{ pathinfo($rock->image_1, PATHINFO_EXTENSION) }};base64,{{ $rock->image_1 }}'"
                         class="w-full h-[200px] object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 cursor-pointer">
                </div>
            </div>
        @endif

        <!-- Image 2 -->
        @if($rock->image_2)
            <div class="image-item group">
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="data:image/{{ pathinfo($rock->image_2, PATHINFO_EXTENSION) }};base64,{{ $rock->image_2 }}"
                         alt="Image 2"
                         @click="fullScreenImage = 'data:image/{{ pathinfo($rock->image_2, PATHINFO_EXTENSION) }};base64,{{ $rock->image_2 }}'"
                         class="w-full h-[200px] object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 cursor-pointer">
                </div>
            </div>
        @endif

        <!-- Image 3 -->
        @if($rock->image_3)
            <div class="image-item group">
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="data:image/{{ pathinfo($rock->image_3, PATHINFO_EXTENSION) }};base64,{{ $rock->image_3 }}"
                         alt="Image 3"
                         @click="fullScreenImage = 'data:image/{{ pathinfo($rock->image_3, PATHINFO_EXTENSION) }};base64,{{ $rock->image_3 }}'"
                         class="w-full h-[200px] object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 cursor-pointer">
                </div>
            </div>
        @endif
    </div>

    <!-- Full-Screen Image Modal -->
    <div x-show="fullScreenImage"
         @click="fullScreenImage = null"
         @keydown.escape.window="fullScreenImage = null"
         class="fixed inset-0 bg-black bg-opacity-90 flex justify-center items-center z-50 p-4">
        <div class="relative p-4">
            <!-- Full-Screen Image with Margin -->
            <img :src="fullScreenImage" class="h-[80dvh] object-contain p-10">

            <!-- Close Button in Top Right Corner -->
            <button @click="fullScreenImage = null"
                    class="absolute top-0 right-0 text-3xl text-white ">
                &times;
            </button>
        </div>
    </div>
</div>
