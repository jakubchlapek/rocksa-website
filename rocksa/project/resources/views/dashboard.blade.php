<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <!-- Dodanie guzika -->
                <div class="mt-4 text-center">
                    <a href="{{ route('carttestlivewire') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Go to Cart Test Livewire
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
