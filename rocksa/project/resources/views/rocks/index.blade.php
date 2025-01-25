<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($rocks->isEmpty())
                        <p>There are no rocks in the database.</p>
                    @else
                        <x-rock-table :rocks="$rocks"></x-rock-table>
                    @endif
                    <form method="GET" action="{{ route('rocks.create') }}" class="pt-6">
                        <x-primary-button>
                            {{ __('Create new rock') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
