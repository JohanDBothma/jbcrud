<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"
    >
    <livewire:styles />
    <wireui:scripts />
    <livewire:livewire-ui-modal />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <livewire:scripts />

    <div class="pb- relative overflow-hidden bg-white">
        <div
            class="hidden lg:absolute lg:inset-0 lg:block"
            aria-hidden="true"
        >
            <svg
                class="absolute top-0 right-0 translate-x-0 -translate-y-8 transform"
                width="640"
                height="784"
                fill="none"
                viewBox="0 0 640 784"
            >
                <defs>
                    <pattern
                        id="9ebea6f4-a1f5-4d96-8c4e-4c2abf658047"
                        x="118"
                        y="0"
                        width="20"
                        height="20"
                        patternUnits="userSpaceOnUse"
                    >
                        <rect
                            x="0"
                            y="0"
                            width="4"
                            height="4"
                            class="text-gray-200"
                            fill="currentColor"
                        />
                    </pattern>
                </defs>
                <rect
                    y="72"
                    width="640"
                    height="640"
                    class="text-gray-50"
                    fill="currentColor"
                />
                <rect
                    x="118"
                    width="404"
                    height="784"
                    fill="url(#9ebea6f4-a1f5-4d96-8c4e-4c2abf658047)"
                />
            </svg>
        </div>
        <div class="relative pt-6 pb-16 sm:pb-4">
            <div>
                @include('layouts.navigation')
                <!-- Page Content -->
                <main class="mt-12">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>
