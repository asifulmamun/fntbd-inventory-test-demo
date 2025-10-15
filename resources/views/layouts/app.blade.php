<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Inventory' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>.container{max-width:1100px}</style>
    @stack('head')
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white border-b">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="font-semibold">Inventory</a>
            @auth
            <div class="space-x-4">
                <a href="{{ route('billables.index') }}" class="text-sm">Billables</a>
                <a href="{{ route('consumables.index') }}" class="text-sm">Consumables</a>
                <form class="inline" method="POST" action="{{ route('logout') }}">@csrf<button class="text-sm text-red-600">Logout</button></form>
            </div>
            @endauth
        </div>
    </nav>
    <main class="container mx-auto px-4 py-6">
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>


