<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold text-2xl mb-6">Create a new order!</h1>

                    <!-- Items Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        @foreach($cart as $productId => $item)
                            <div class="border rounded-lg shadow-md p-4 flex flex-col items-center space-y-4">
                                <!-- Product Image -->
                                <img src="data:image/{{ pathinfo($item['image'], PATHINFO_EXTENSION) }};base64,{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-24 h-24 object-cover rounded-lg">

                                <!-- Product Info -->
                                <div class="text-center">
                                    <p class="font-semibold text-gray-900">{{ $item['name'] }}</p>
                                    <p class="text-gray-500 text-sm">{{ $item['price'] }} € x {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Total Amount -->
                    <div class="border-t pt-4 mt-6">
                        <p class="text-lg font-bold text-gray-900">
                            Total: {{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }} €
                        </p>
                    </div>

                    <!-- Order Form -->
                    <form method="POST" action="{{ route('orders.store') }}" class="mt-6">
                        @csrf
                        <div class="flex flex-row gap-4">
                            <div class="w-1/2">
                                <!-- Left half form fields -->
                                <div class="mt-4">
                                    <x-input-label for="first_name" :value="__('First Name')"/>
                                    <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"/>
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('E-mail')"/>
                                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="street" :value="__('Street')"/>
                                    <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')"/>
                                    <x-input-error :messages="$errors->get('street')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="postal_code" :value="__('Postal Code')"/>
                                    <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')"/>
                                    <x-input-error :messages="$errors->get('postal_code')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="w-1/2">
                                <!-- Right half form fields -->
                                <div class="mt-4">
                                    <x-input-label for="last_name" :value="__('Last Name')"/>
                                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"/>
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="phone_number" :value="__('Phone Number')"/>
                                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')"/>
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="city" :value="__('City')"/>
                                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"/>
                                    <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
