<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Rock Information -->
                    <div>
                        <p class="text-xl"><b>Listing Title: </b>{{ $rock->title }}</p>
                        <p class="text-xl"><b>Main Mineral: </b>{{ $rock->main_mineral }}</p>
                        <p class="text-xl"><b>Treatment: </b>{{ $rock->treatment }}</p>
                        <p class="text-xl"><b>Weight: </b>{{ $rock->weight }}</p>
                        <p class="text-xl"><b>Density: </b>{{ $rock->density }} <i>g/cm³</i></p>
                        <p class="text-xl"><b>Color: </b>{{ $rock->color }}</p>
                        <p class="text-xl"><b>Clarity: </b>{{ $rock->clarity }}</p>
                        <p class="text-xl"><b>Toughness: </b>{{ $rock->toughness }} <i>(in Mohs scale)</i></p>
                        <p class="text-xl"><b>Rarity: </b>{{ $rock->rarity }}</p>
                        <div class="pt-3">
                            <b>Description: </b>@markdown($rock->description)
                        </div>
                        {{$rock->main_image}}

                        {{$rock->image_1}}
                        <p class="text-sm text-gray-500 pt-3">
                            <strong class="mr-1">From:</strong>{{ $rock->country_of_origin }}
                        </p>
                    </div>

                    <!-- Edit/Delete Actions -->
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
                    @endif

                    <!-- Comments Section -->
                    <div class="mt-5 rounded-2xl space-y-5 p-5 bg-gray-100">
                        <h2 class="text-xl font-bold">{{ __('Comments') }}</h2>
                        @forelse($rock->comments as $comment)
                            @if(!$comment->parent)
                                <div class="block rounded-2xl bg-white ring-2 ring-gray-300 p-2">
                                    <!-- Parent Comment -->
                                    <div class="border-t p-2 px-5 mb-2 rounded-xl bg-gray-200">
                                        <p class="text-sm text-gray-500 mb-2">
                                            <strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->format('M d, Y H:i') }}
                                        </p>
                                        <p>{{ $comment->content }}</p>
                                    </div>

                                    <!-- Child Comments -->
                                    <div class="pl-5 rounded-xl space-y-2">
                                        @forelse($comment->children as $child)
                                            <div class="p-2 px-5 rounded-xl bg-gray-300">
                                                <p class="text-sm text-gray-500">
                                                    <strong>{{ $child->user->name }}</strong> - {{ $child->created_at->format('M d, Y H:i') }}
                                                </p>
                                                <p>{{ $child->content }}</p>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>

                                    <!-- Reply Button -->
                                    <div x-data="{ showReplyForm: false }" class="block p-2 mt-2 ">
                                        <div class="flex flex-row w-24 flex-row p-1 px-2 bg-gray-300 rounded-2xl items-center justify-between">
                                            <x-ri-chat-ai-line class="w-6 h-6" />
                                            <button @click="showReplyForm = !showReplyForm" class="focus:outline-none">
                                                {{ __('Reply') }}
                                            </button>
                                        </div>

                                        <!-- Reply Form -->
                                        <div x-show="showReplyForm" class="mt-3 bg-gray-100 p-4 transition-transform duration-300 ease-in-out rounded-lg ring-2 ring-gray-500">
                                            <form method="POST" action="{{ route('comments.store', $rock) }}">
                                                @csrf
                                                <!-- Parent Comment ID -->
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <!-- Subcomment Content -->
                                                <textarea name="content" id="content" rows="5"
                                                          class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                                          placeholder="Write your comment here..."></textarea>
                                                <x-input-error :messages="$errors->get('content')" class="mt-2" />

                                                <!-- Submit Button -->
                                                <div class="mt-4 flex justify-end">
                                                    <x-primary-button>
                                                        {{ __('Post Reply') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <p class="text-gray-500">{{ __('No comments yet.') }}</p>
                        @endforelse
                    </div>

                    <!-- Add New Comment -->
                    <form method="POST" action="{{ route('comments.store', $rock) }}">
                        @csrf
                        <div class="mt-4">
                            <textarea name="content" id="content" rows="5"
                                      class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Write your comment here..."></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Post Comment') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
