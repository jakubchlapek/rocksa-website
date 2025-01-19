<div x-data="{ isOpen: $wire.entangle('isOpen') }" class="relative">
    <!-- Cart Icon Button -->
    <button wire:click="toggleCart" class="fixed top-6 right-6 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-110">
        <x-ri-shopping-cart-line class="w-8 h-8" />
    </button>

    <!-- Cart Sidebar -->
    <div
        x-show="isOpen"
        x-transition:enter="transform transition ease-in-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        @keydown.escape.window="isOpen = false"
        class="fixed top-0 right-0 w-96 h-full bg-white shadow-2xl p-6 overflow-y-auto rounded-l-lg border-l border-gray-200"
    >
        <!-- Close Button (X) -->
        <button
            @click="isOpen = false"
            class="absolute top-4 right-4 text-3xl text-gray-600 hover:text-gray-900 transition duration-200"
        >
            &times;
        </button>

        <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Shopping Cart</h2>

        @if(empty($cart))
            <p class="text-gray-500 mt-6 text-center">Your cart is empty.</p>
        @else
            <ul class="divide-y divide-gray-200 mt-4">
                @foreach($cart as $productId => $item)
                    <li class="flex justify-between items-center py-4">
                        <div class="flex items-center space-x-4">
                            <!-- Product Image -->
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-lg shadow-md">
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">{{ $item['name'] }}</p>
                                <p class="text-gray-500 text-sm">${{ $item['price'] }} x {{ $item['quantity'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <!-- Increase Quantity -->
                            <button
                                wire:click="updateQuantity({{ $productId }}, 1)"
                                class="bg-green-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-green-600 transition duration-200"
                            >
                                <span class="text-2xl">+</span>
                            </button>
                            <!-- Decrease Quantity -->
                            <button
                                wire:click="updateQuantity({{ $productId }}, -1)"
                                class="bg-yellow-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-yellow-600 transition duration-200"
                            >
                                <span class="text-2xl">-</span>
                            </button>
                        </div>
                        <button
                            wire:click="handleRemoveFromCart({{ $productId }})"
                            class="bg-red-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 transition duration-200"
                        >
                            <span class="text-2xl">&times;</span>
                        </button>
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Total and Clear Cart Button -->
        <div class="absolute bottom-6 left-6 right-6 flex justify-between items-center">
            <p class="text-gray-900 font-semibold text-lg">
                Total: ${{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}
            </p>
            <button wire:click="clearCart" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200 shadow-md">
                Clear Cart
            </button>


                <button wire:click="proceedToCheckout" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Proceed to Checkout
                </button>

        </div>
    </div>
</div>
