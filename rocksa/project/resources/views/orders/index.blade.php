<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($orders->isEmpty())
                        <p>There are no orders in the database.</p>
                    @else
                         @foreach($orders as $order)
                                {{$order}}
                         @endforeach
                    @endif
                    <form method="GET" action="{{ route('orders.create') }}" class="pt-6">
                        <x-primary-button>
                            {{ __('Create new order') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
