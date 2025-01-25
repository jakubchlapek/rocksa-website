@props(['rocks'])

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
            Price
        </th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($rocks as $rock)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $rock->title }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $rock->main_mineral }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $rock->treatment }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $rock->weight }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $rock->rarity }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{ $rock->price }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-blue-600 underline">
                    <a href="{{ route('rocks.show', $rock) }}">Details</a></div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
