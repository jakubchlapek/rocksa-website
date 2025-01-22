<div x-data="{
        expanded: false,
        inCart: false,
        showImageGallery: false,
        fullScreenImage: null
    }"
     x-init="
        window.addEventListener('removedFromCart', event => {
            if (!event.detail || !event.detail[0].removedProductId) {
                console.error('Invalid removedFromCart event:', event.detail);
                return;
            }

            const removedProductId = event.detail[0].removedProductId;
            console.log('Received removedFromCart event:', removedProductId);

            const productId = {{ $data['rockId'] }};
            if (removedProductId === productId) {
                inCart = false;
            }
        });

        window.addEventListener('cartCleared', event => {
            console.log('Received cartCleared event');
            inCart = false;
        });
    "
     @keydown.escape.window="fullScreenImage ? fullScreenImage = null : showImageGallery = false"
     class="flex flex-col h-[35rem] text-2xl font-bold ring-4 ring-gray-300 shadow-lg rounded-2xl bg-gray-50 transition-all duration-500 ease-in-out"
     :class="{ 'w-[30rem]': expanded, 'w-[20rem]': !expanded }">

    <!-- Full-Screen Image View -->
    <div x-show="fullScreenImage"
         @click="fullScreenImage = null"
         class="fixed inset-0 bg-black bg-opacity-90 flex p-5 justify-center items-center z-[60]">
        <div @click.stop >
            <img :src="fullScreenImage" class="object-contain h-[90dvh] p-5">
            <button @click="fullScreenImage = null" class="absolute hover:scale-125 top-2 right-2 p-2 text-white">
                <x-ri-close-line class="w-6 h-6" />
            </button>
        </div>
    </div>

    <!-- Image Gallery Modal -->
    <div x-show="showImageGallery"
         @click.self="if (!fullScreenImage) showImageGallery = false"
         class="fixed inset-0 p-5 bg-black bg-opacity-50 flex justify-center items-center z-[50]">
        <div class="bg-white p-10 rounded-xl max-w-[1500px] relative">
            <h2 class="text-2xl font-bold mb-5">More images</h2>
            <div class="grid grid-cols-3 gap-5">
                @foreach ($data['moreImages'] as $moreImage)
                    <div class="cursor-pointer" @click="fullScreenImage = '{{ asset($moreImage) }}'">
                        <img src="{{ asset($moreImage) }}" alt="Image" class="w-[400px] h-[400px] transition-all duration-200 hover:shadow-lg hover:scale-[102%] object-cover rounded-xl">
                    </div>
                @endforeach
            </div>
            <button @click="showImageGallery = false" class="absolute hover:scale-125 top-2 right-2 p-2 text-gray-700">
                <x-ri-close-line class="w-6 h-6" />
            </button>
        </div>
    </div>

    <!-- Main Image -->
    <div class="relative rounded-2xl w-full h-[20rem] overflow-hidden shadow-lg">
        <img src="{{$data['image']}}" alt="Rock Image">
    </div>

    <div class="flex flex-col p-5">
        <h1 class="text-4xl text-black font-bold mb-2">{{ $data['name'] }}</h1>
        <div class="flex flex-col space-y-2">
            <div class="flex items-center space-x-3">
                <x-ri-palette-line class="w-6 h-6 text-gray-500" />
                <h2 class="text-lg font-light">{{ $data['color'] }}</h2>
            </div>
            <div class="flex items-center space-x-3">
                <x-ri-map-pin-line class="w-6 h-6 text-gray-500" />
                <h2 class="text-lg font-light">{{ $data['origin'] }}</h2>
            </div>
            <div class="flex items-center space-x-3">
                <x-ri-sparkling-fill class="w-6 h-6 text-gray-500" />
                <h2 class="text-lg font-light">{!! $data['properties'] !!}</h2>
            </div>
        </div>
        <div class="mt-4 text-2xl text-gray-700 font-semibold">
            <span>Price: </span>
            <span class="text-green-500">{{ number_format($data['price'], 2) }} €</span>
        </div>
        <div x-show="expanded" x-transition class="mt-4 text-base text-gray-700">
            <p>{!! $data['description'] !!}</p>
        </div>
    </div>

    <div class="flex justify-between items-center px-5 pb-5">
        <div class="flex space-x-3">
            <button @click="expanded = !expanded"
                    :class="{'bg-blue-500': expanded, 'bg-black hover:bg-gray-600': !expanded}"
                    class="flex items-center justify-center w-12 h-12 rounded-full transition-all duration-100 bg-black text-white shadow-lg">
                <x-ri-search-2-line class="w-6 h-6" />
            </button>
            <button @click="showImageGallery = !showImageGallery"
                    :class="{'bg-blue-500': showImageGallery, 'bg-black hover:bg-gray-600': !showImageGallery}"
                    class="flex items-center justify-center w-12 h-12 rounded-full transition-all duration-100 bg-black text-white shadow-lg">
                <x-ri-image-line class="w-6 h-6" />
            </button>
            <a href="/rocks/{{ $data['rockId'] }}"
               class="flex items-center justify-center w-12 h-12 rounded-full transition-all duration-200 bg-black hover:bg-gray-600 text-white shadow-lg">
                <x-ri-chat-3-line class="w-6 h-6" />
            </a>
        </div>
        <!-- Add/Remove from Cart Button -->
        <button @click="
        if (!inCart) {
            Livewire.dispatch('addToCart', [{{ $data['rockId'] }}, '{{ $data['name'] }}', {{ $data['price'] }}, '{{ $data['image'] }}'] );
        } else {
            Livewire.dispatch('removeFromCart', [{{ $data['rockId'] }}]);
        }
        inCart = !inCart"
                @mouseover="clearTimeout(timer); timer = setTimeout(() => hovering = true, 100)"
                @mouseleave="clearTimeout(timer); hovering = false"
                        :class="{
            'bg-green-500': inCart && !hovering,
            'bg-red-500': inCart && hovering,
            'bg-black hover:bg-gray-600': !inCart
        }"
                class="flex items-center justify-center w-12 h-12 rounded-full transition-all duration-200 text-white shadow-lg"
                x-data="{ hovering: false, timer: null }">
            <!-- Default "Add" Icon -->
            <span x-show="!inCart">
                <x-ri-add-line class="w-8 h-8" />
            </span>
            <!-- Check Icon (when added to cart) -->
            <span x-show="inCart && !hovering">
                <x-ri-check-line class="w-8 h-8" />
            </span>
            <!-- X Icon (when hovering over the button while item is in cart) -->
            <span x-show="inCart && hovering">
                <x-ri-close-line class="w-8 h-8" />
            </span>
        </button>
    </div>
</div>
