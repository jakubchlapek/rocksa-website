<x-app-layout>
    <div class="py-5 mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Rock Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b pb-6">
                        <div>
                            <p class="text-xl font-semibold"><b>Listing Title:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->title }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Category:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->category->name }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Main Mineral:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->main_mineral }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Treatment:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->treatment }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Weight:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->weight }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Density:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->density }} <i>g/cm³</i></p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Color:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->color }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Clarity:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->clarity }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Toughness:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->toughness }} <i>(in Mohs scale)</i></p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Rarity:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->rarity }}</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold"><b>Country of Origin:</b></p>
                            <p class="text-lg text-gray-700">{{ $rock->country_of_origin }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-xl font-semibold"><b>Description:</b></p>
                        <div class="text-lg text-gray-700">@markdown($rock->description)</div>
                    </div>

                    <x-images-gallery :rock="$rock"></x-images-gallery>

                    <!-- Edit/Delete Actions -->
                    @if($isOwner)
                        <div class="flex space-x-4 mt-6">
                            <form method="GET" action="{{ route('rocks.edit', $rock) }}">
                                <x-primary-button>
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </form>
                            <form method="POST" action="{{ route('rocks.destroy', $rock) }}">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-800 hover:bg-red-600">
                                    {{ __('Delete') }}
                                </x-primary-button>
                            </form>
                        </div>
                    @endif

                    <!-- Comments Section -->
                    <div class="mt-8 rounded-2xl space-y-5 p-5 bg-gray-100">
                        <h2 class="text-2xl font-bold">{{ __('Comments') }}</h2>
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
                                    <div x-data="{ showReplyForm: false }" class="block p-2 mt-2">
                                        <div class="flex w-24 flex-row p-1 px-2 bg-gray-300 rounded-2xl items-center justify-between">
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
