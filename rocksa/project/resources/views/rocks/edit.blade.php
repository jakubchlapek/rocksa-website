<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('rocks.update', $rock) }}">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-row gap-4">
                            <div class="w-1/2">
                                <div class="mt-4">
                                    <x-input-label for="title" :value="__('Title')"/>
                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                                  :value="$rock->title"/>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="main_mineral" :value="__('Main Mineral')"/>
                                    <x-text-input id="main_mineral" class="block mt-1 w-full" type="text" name="main_mineral"
                                                  :value="$rock->main_mineral"/>
                                    <x-input-error :messages="$errors->get('main_mineral')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="weight" :value="__('Weight')"/>
                                    <x-text-input id="weight" class="block mt-1 w-full" type="text" name="weight"
                                                  :value="$rock->weight"/>
                                    <x-input-error :messages="$errors->get('weight')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="density" :value="__('Density')"/>
                                    <x-text-input id="density" class="block mt-1 w-full" type="text" name="density"
                                                  :value="$rock->density"/>
                                    <x-input-error :messages="$errors->get('density')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="rarity" :value="__('Rarity')"/>
                                    <x-text-input id="rarity" class="block mt-1 w-full" type="text" name="rarity"
                                                  :value="$rock->rarity"/>
                                    <x-input-error :messages="$errors->get('rarity')" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="price" :value="__('Price')"/>
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                                  :value="$rock->price"/>
                                    <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="mt-4">
                                    <x-input-label for="treatment" :value="__('Treatment')"/>
                                    <x-text-input id="treatment" class="block mt-1 w-full" type="text" name="treatment"
                                                  :value="$rock->treatment"/>
                                    <x-input-error :messages="$errors->get('treatment')" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="country_of_origin" :value="__('Country of Origin')"/>
                                    <x-text-input id="country_of_origin" class="block mt-1 w-full" type="text" name="country_of_origin"
                                                  :value="$rock->country_of_origin"/>
                                    <x-input-error :messages="$errors->get('country_of_origin')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="color" :value="__('Color')"/>
                                    <x-text-input id="color" class="block mt-1 w-full" type="text" name="color"
                                                  :value="$rock->color"/>
                                    <x-input-error :messages="$errors->get('color')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="clarity" :value="__('Clarity')"/>
                                    <x-text-input id="clarity" class="block mt-1 w-full" type="text" name="clarity"
                                                  :value="$rock->clarity"/>
                                    <x-input-error :messages="$errors->get('clarity')" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="toughness" :value="__('Toughness')"/>
                                    <x-text-input id="toughness" class="block mt-1 w-full" type="text" name="toughness"
                                                  :value="$rock->toughness"/>
                                    <x-input-error :messages="$errors->get('toughness')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        <!-- Dodanie pola do przesyłania obrazu -->
                        <div class="mt-4">
                            <x-input-label for="main_image" :value="__('Main Image (optional)')" />
                            <input type="file" name="main_image" class="block mt-1 w-full"/>
                            <x-input-error :messages="$errors->get('main_image')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image_1" :value="__('Image 1 (optional)')" />
                            <input type="file" name="image_1" class="block mt-1 w-full"/>
                            <x-input-error :messages="$errors->get('image_1')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="image_2" :value="__('Image 2 (optional)')" />
                            <input type="file" name="image_2" class="block mt-1 w-full"/>
                            <x-input-error :messages="$errors->get('image_2')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="image_3" :value="__('Image 3 (optional)')" />
                            <input type="file" name="image_3" class="block mt-1 w-full"/>
                            <x-input-error :messages="$errors->get('image_3')" class="mt-2" />
                        </div>
                        <x-images-gallery :rock="$rock"></x-images-gallery>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')"/>
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                          :value="$rock->description"/>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                            <div class="mt-4">
                                <x-input-label for="category_id" :value="__('Category')"/>
                                <select id="category_id" name="category_id" class="block mt-1 w-full">
                                    <option value="">{{ __('Select a category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $rock->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                            </div>

                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
