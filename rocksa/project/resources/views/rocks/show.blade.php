<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Informacje o skale -->
                    <div>
                        <p class="text-xl"><b>Listing Title: </b>{{ $rock->title }}</p>
                        <p class="text-xl"><b>Main Mineral: </b>{{ $rock->main_mineral }}</p>
                        <p class="text-xl"><b>Treatment: </b>{{ $rock->treatment }}</p>
                        <p class="text-xl"><b>Weight: </b>{{ $rock->weight }}</p>
                        <p class="text-xl"><b>Density: </b>{{ $rock->density }} <i>g/cm^3</i></p>
                        <p class="text-xl"><b>Color: </b>{{ $rock->color }}</p>
                        <p class="text-xl"><b>Clarity: </b>{{ $rock->clarity }}</p>
                        <p class="text-xl"><b>Toughness: </b>{{ $rock->toughness }} <i>(in Mohs scale)</i></p>
                        <p class="text-xl"><b>Rarity: </b>{{ $rock->rarity }}</p>
                        <div class="pt-3">
                            <b>Description: </b>@markdown($rock->description)
                        </div>
                        <p class="text-sm text-gray-500 pt-3"><strong class="mr-1">From:</strong>{{ $rock->country_of_origin }}</p>
                    </div>

                    <!-- Akcje edytuj / usuń -->
                    @if($isOwner)
                    <div class="flex justify-left">
                        <form method="GET" action="{{ route('rocks.edit', $rock) }}" class="pt-6">
                            <x-primary-button>
                                {{ __('Edit') }}
                            </x-primary-button>
                        </form>
                        <form method="POST" action="{{ route('rocks.destroy', $rock) }}" class="pt-6 pl-3">
                            @csrf
                            @method('DELETE')
                            <x-primary-button class="bg-red-800 hover:bg-red-600">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </form>
                    </div>

                    <!-- Sekcja komentarzy -->
                    <div class="pt-12">
                        <h2 class="text-xl font-bold">{{ __('Comments') }}</h2>
                        @forelse($rock->comments as $comment)
                            <div class="border-t mt-2 pt-2">
                                <p class="text-sm text-gray-500">
                                    <strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->format('M d, Y H:i') }}
                                </p>
                                <p>{{ $comment->content }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500">{{ __('No comments yet.') }}</p>
                        @endforelse
                    </div>

                    <form method="POST" action="{{ route('comments.store', $rock) }}">
                        @csrf
                        <div class="mt-4">
        <textarea name="content" id="content" rows="5"
                  class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                  placeholder="Write your comment here..."></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Post Comment') }}
                            </x-primary-button>
                        </div>
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
