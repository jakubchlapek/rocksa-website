<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6">
                        <p class="text-xl"><b>First name:</b> {{ $order->first_name }}</p>
                        <p class="text-xl"><b>Last name:</b> {{ $order->last_name }}</p>
                        <p class="text-xl"><b>City:</b> {{ $order->city }}</p>
                        <p class="text-xl"><b>Street:</b> {{ $order->street }}</p>
                        <p class="text-xl"><b>Postal Code:</b> {{ $order->postal_code }}</p>
                        <p class="text-xl"><b>E-mail:</b> {{ $order->email }}</p>
                        <p class="text-xl"><b>Phone Number:</b> {{ $order->phone_number }}</p>
                        <p class="text-xl"><b>Total:</b> ${{ number_format($order->total, 2) }}</p>
                        <p class="text-xl"><b>Order Date:</b> {{ $order->created_at->format('Y-m-d H:i') }}</p>

                        <h3 class="text-2xl mt-6 mb-4"><b>Order Items:</b></h3>
                        <div class="grid gap-4">
                            @if($order->orderItems)
                                <table class="min-w-full divide-y divide-gray-200 border-gray-100 border-2">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Main Mineral
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Treatment
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Weight
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rarity
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Quantity
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                        </th>
                                    </tr>
                                    </thead>
                                @foreach($order->orderItems as $item)
                                        <tbody>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $item->rocks->title }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $item->rocks->main_mineral }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $item->rocks->treatment }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $item->rocks->weight }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $item->rocks->rarity }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $item->quantity }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">${{ $item->price * $item->quantity}} </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-blue-600 underline">
                                                        <a href="{{ route('rocks.show', $item->rocks) }}">Details</a></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                @endforeach
                                </table>
                            @else
                                <p>No order items found.</p>
                            @endif

                        </div>
                    </div>

                    <div class="flex justify-left">
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
