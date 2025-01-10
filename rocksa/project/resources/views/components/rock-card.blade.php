<pre>{{var_dump($more_images)}}</pre>
<div x-data="{ expanded: false, inCart: false, showImagePicker: false, selectedImage: '{{ $image }}' }"
     class="flex flex-col h-[30rem] text-2xl font-bold ring-8 ring-gray-200 shadow-lg rounded-2xl bg-gray-100 transition-all duration-500 ease-in-out"
     :class="{ 'w-[32rem]': expanded, 'w-[20rem]': !expanded }">
    <!-- Image Picker Modal -->
    <div x-show="showImagePicker" @click.away="showImagePicker = false" @keydown.escape.window="showImagePicker = false"
         class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-5 rounded-xl w-[80%] max-w-[20rem] relative">
            <h2 class="text-2xl font-bold mb-4">Select an Image</h2>
            <div class="grid grid-cols-3 gap-3">
                <!-- Loop through the images and display them -->
                @foreach ($more_images as $more_image)
                    <div class="cursor-pointer" @click="selectedImage = '{{ $more_image }}'">
                        <img src="{{ asset($more_image) }}" alt="Image" class="w-full h-full object-cover rounded-lg">
                        <p class="text-center mt-2 text-sm text-gray-600">{{ $more_image }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Close Button -->
            <button @click="showImagePicker = false" class="absolute top-2 right-2 p-2 text-gray-700">
                <x-ri-close-line class="w-6 h-6" />
            </button>
        </div>
    </div>

    <!-- Main Image -->
    <div class="relative rounded-xl w-full h-[20rem] overflow-hidden shadow-lg">
        <img :src="selectedImage" alt="image" class="object-cover w-full h-full">
    </div>

    <div class="flex flex-col p-5">
        <h1 class="text-4xl text-black font-bold mb-2">{{ $name }}</h1>

        <div class="flex flex-col space-y-2">
            <div class="flex items-center space-x-3">
                <x-ri-palette-line class="w-6 h-6 text-gray-500" />
                <h2 class="text-lg font-light">{{ $color }}</h2>
            </div>

            <div class="flex items-center space-x-3">
                <x-ri-map-pin-line class="w-6 h-6 text-gray-500" />
                <h2 class="text-lg font-light">{{ $origin }}</h2>
            </div>

            <div class="flex items-center space-x-3">
                <x-ri-sparkling-fill class="w-6 h-6 text-gray-500" />
                <h2 class="text-lg font-light">{{ $properties }}</h2>
            </div>
        </div>

        <!-- Display price -->
        <div class="mt-4 text-2xl text-gray-700 font-semibold">
            <span>Price: </span>
            <span class="text-green-500">{{ number_format($price, 2) }} €</span>
        </div>

        <!-- Additional info (only visible when expanded) -->
        <div x-show="expanded" x-transition class="mt-4 text-base text-gray-700">
            <p>{{ $description }}</p>
        </div>
    </div>

    <div class="flex justify-between items-center px-5 pb-5">
        <!-- Expand Button and Image Picker Button together on the left -->
        <div class="flex space-x-3">
            <!-- Expand button -->
            <button @click="expanded = !expanded"
                    :class="{'bg-blue-500': expanded, 'bg-black': !expanded}"
                    class="flex items-center justify-center w-12 h-12 rounded-full transition-all duration-100 bg-black text-white shadow-lg">
                <x-ri-search-2-line class="w-6 h-6" />
            </button>

            <!-- Image Picker button -->
            <button @click="showImagePicker = !showImagePicker"
                    :class="{'bg-blue-500': showImagePicker, 'bg-black': !showImagePicker}"
                    class="flex items-center justify-center w-12 h-12 rounded-full transition-all duration-100 bg-black text-white shadow-lg">
                <x-ri-image-line class="w-6 h-6" />
            </button>
        </div>

        <!-- Add to Cart button on the right -->
        <button @click="inCart = !inCart"
                :class="{'bg-green-500': inCart, 'bg-black': !inCart}"
                class="flex items-center justify-center w-12 h-12 rounded-full transition-all duration-100 text-white shadow-lg">
            <template x-if="!inCart">
                <x-ri-add-line class="w-8 h-8" />
            </template>
            <template x-if="inCart">
                <x-ri-check-line class="w-8 h-8" />
            </template>
        </button>
    </div>
</div>
