<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold text-2xl">Create a new order!</h1>
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf
                        <div class="flex flex-row gap-4">
                            <div class="w-1/2">
                                <div class="mt-4">
                                    <x-input-label for="first_name" :value="__('First Name')"/>
                                    <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                                  :value="old('first_name')"/>
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('E-mail')"/>
                                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                                  :value="old('email')"/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="street" :value="__('Street')"/>
                                    <x-text-input id="street" class="block mt-1 w-full" type="text" name="street"
                                                  :value="old('street')"/>
                                    <x-input-error :messages="$errors->get('street')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="postal_code" :value="__('Postal Code')"/>
                                    <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code"
                                                  :value="old('postal_code')"/>
                                    <x-input-error :messages="$errors->get('postal_code')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="w-1/2">
                                <div class="mt-4">
                                    <x-input-label for="last_name" :value="__('Last Name')"/>
                                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                                  :value="old('last_name')"/>
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="phone_number" :value="__('Phone Number')"/>
                                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                                                  :value="old('phone_number')"/>
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="city" :value="__('City')"/>
                                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                                  :value="old('city')"/>
                                    <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                                </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
