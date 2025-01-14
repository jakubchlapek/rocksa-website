<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <p class="text-xl">{{ $order->first_name }}</p>
                        <p class="text-xl">{{ $order->last_name }}</p>
                        <p class="text-xl">{{ $order->city }}</p>
                        <p class="text-xl">{{ $order->email }}</p>
                        <p class="text-xl">{{ $order->phone_number }}</p>
                        <p class="text-xl">{{ $order->street }}</p>
                        <p class="text-xl">{{ $order->postal_code }}</p>
                    </div>
                    <div class="flex justify-left">
                        <form method="GET" action="{{ route('orders.edit', $order) }}" class="pt-6">
                            <x-primary-button>
                                {{ __('Edit') }}
                            </x-primary-button>
                        </form>
                        <form method="POST" action="{{ route('orders.destroy', $order) }}" class="pt-6 pl-3">
                            @csrf
                            @method('DELETE')
                            <x-primary-button class="bg-red-800 hover:bg-red-600">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
