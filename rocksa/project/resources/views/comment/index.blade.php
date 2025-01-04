<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Comments') }}
    </div>
    <ul class="ml-6">
        @foreach($comments as $comment)
            <li class="list-disc">
                <a href="{{ route('comments.show', $comment) }}" class="text-blue-700 underline">
                    {{ $comment->title }}
                </a>
            </li>
        @endforeach
    </ul>
</x-guest-layout>
