<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Order Summary Section -->
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Order Details</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <p class="text-lg"><b>First Name:</b> {{ $order->first_name }}</p>
                        <p class="text-lg"><b>Last Name:</b> {{ $order->last_name }}</p>
                        <p class="text-lg"><b>City:</b> {{ $order->city }}</p>
                        <p class="text-lg"><b>Street:</b> {{ $order->street }}</p>
                        <p class="text-lg"><b>Postal Code:</b> {{ $order->postal_code }}</p>
                        <p class="text-lg"><b>E-mail:</b> {{ $order->email }}</p>
                        <p class="text-lg"><b>Phone Number:</b> {{ $order->phone_number }}</p>
                        <p class="text-lg"><b>Total:</b> {{ number_format($order->total, 2) }} €</p>
                        <p class="text-lg"><b>Order Date:</b> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>

                <!-- Order Items Section -->
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Order Items</h3>

                    @if($order->orderItems)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse bg-white shadow-md">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Name</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Main Mineral</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Treatment</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Weight</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Rarity</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Quantity</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Price</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Details</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @foreach($order->orderItems as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-gray-800">{{ $item->rocks->title }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $item->rocks->main_mineral }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $item->rocks->treatment }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $item->rocks->weight }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $item->rocks->rarity }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $item->quantity }}</td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $item->price }} € x {{ $item->quantity }}
                                        </td>
                                        <td class="px-6 py-4 text-blue-600 underline">
                                            <a href="{{ route('rocks.show', $item->rocks) }}">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">No order items found.</p>
                    @endif
                </div>

                <!-- Delete Button -->
                <div class="p-6 border-t border-gray-200 bg-gray-50">
                    <form method="POST" action="{{ route('orders.destroy', $order) }}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="bg-red-600 hover:bg-red-500">
                            {{ __('Delete Order') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
