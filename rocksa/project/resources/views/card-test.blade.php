<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rocksa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased">
<div class="flex w-full h-[500px] p-10 space-x-10">
    <!-- Amethyst Rock Card Example -->
    <div class="flex w-full h-[500px] p-10 space-x-10">
        <x-rock-card :data="[
            'rockId' => 1,
            'image' => '/static/amethyst.jpg',
            'name' => 'Amethyst',
            'color' => 'Purple',
            'origin' => 'Brazil',
            'properties' => 'Healing, Protection, Calmness',
            'description' => 'Amethyst is a stunning purple gemstone known for its healing properties...',
            'price' => 29.99,
            'moreImages' => ['/static/amethyst.jpg', '/static/amethyst1.jpg', '/static/amethyst2.jpg']
        ]" />
    </div>
</div>
</body>
</html>
