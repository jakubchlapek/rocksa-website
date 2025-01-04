<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __($comment->title) }}
    </div>
    @markdown($comment->text)
</x-guest-layout>
