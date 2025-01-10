<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold text-2xl">Create a rock!</h1>
                    <form method="POST" action="{{ route('rocks.store') }}">
                        @csrf

                        <div class="flex flex-row gap-4">
                            <div class="w-1/2">
                                <div class="mt-4">
                                    <x-input-label for="name" :value="__('Name')"/>
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                  :value="old('name')"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="mineral" :value="__('Main Mineral')"/>
                                    <x-text-input id="mineral" class="block mt-1 w-full" type="text" name="mineral"
                                                  :value="old('mineral')"/>
                                    <x-input-error :messages="$errors->get('mineral')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="weight" :value="__('Weight')"/>
                                    <x-text-input id="weight" class="block mt-1 w-full" type="text" name="weight"
                                                  :value="old('weight')"/>
                                    <x-input-error :messages="$errors->get('weight')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="density" :value="__('Density')"/>
                                    <x-text-input id="density" class="block mt-1 w-full" type="text" name="density"
                                                  :value="old('density')"/>
                                    <x-input-error :messages="$errors->get('density')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="rarity" :value="__('Rarity')"/>
                                    <x-text-input id="rarity" class="block mt-1 w-full" type="text" name="rarity"
                                                  :value="old('rarity')"/>
                                    <x-input-error :messages="$errors->get('rarity')" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="price" :value="__('Price')"/>
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                                  :value="old('price')"/>
                                    <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="mt-4">
                                    <x-input-label for="treatment" :value="__('Treatment')"/>
                                    <x-text-input id="treatment" class="block mt-1 w-full" type="text" name="treatment"
                                                  :value="old('treatment')"/>
                                    <x-input-error :messages="$errors->get('treatment')" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="country" :value="__('Country of Origin')"/>
                                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                                                  :value="old('country')"/>
                                    <x-input-error :messages="$errors->get('country')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="color" :value="__('Color')"/>
                                    <x-text-input id="color" class="block mt-1 w-full" type="text" name="color"
                                                  :value="old('color')"/>
                                    <x-input-error :messages="$errors->get('color')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="clarity" :value="__('Clarity')"/>
                                    <x-text-input id="clarity" class="block mt-1 w-full" type="text" name="clarity"
                                                  :value="old('clarity')"/>
                                    <x-input-error :messages="$errors->get('clarity')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="toughness" :value="__('Toughness')"/>
                                    <x-text-input id="toughness" class="block mt-1 w-full" type="text" name="toughness"
                                                  :value="old('toughness')"/>
                                    <x-input-error :messages="$errors->get('toughness')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')"/>
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                          :value="old('description')"/>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
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
