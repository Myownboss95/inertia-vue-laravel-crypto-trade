<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    {{-- <title>Laravel with Inertia</title> --}}
    @vite
    @routes
    @inertiaHead
</head>

<body class="antialiased bg-gray-900">
    @inertia
    <x-translations />
    @guest
        <x-live-chat />
    @else
        @if (!auth()?->user()?->is_admin)
            <x-live-chat />
        @endif
    @endguest
</body>

</html>
