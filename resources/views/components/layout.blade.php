@props(['title' => config('app.name', 'Laravel')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --primary: 190 173 128; /* #bead80 */
                --primary-dark: 160 143 98;
                --secondary: 250 248 242;
                --accent: 190 173 128; /* #bead80 */
                --card: 255 255 255;
                --card-border: 230 225 215;
                --shadow-colored: 0 4px 12px rgba(190, 173, 128, 0.15);
                --shadow-medium: 0 8px 24px rgba(190, 173, 128, 0.2);
            }
        </style>

        {{ $head ?? '' }}
    </head>
    <body class="min-h-screen bg-white text-[rgb(var(--primary))]">
        <x-header />

        <main>
            {{ $slot }}
        </main>

        <x-footer />

        {{ $scripts ?? '' }}
    </body>
</html>
