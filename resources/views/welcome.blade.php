<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --primary: 28 63 58;
                --secondary: 245 243 235;
                --accent: 59 155 143;
                --card: 255 255 255;
                --card-border: 230 230 230;
                --shadow-colored: 0 4px 12px rgba(59, 155, 143, 0.15);
                --shadow-medium: 0 8px 24px rgba(59, 155, 143, 0.2);
            }
        </style>
    </head>
    <body class="min-h-screen bg-white text-[rgb(var(--primary))]">
        <x-header />

        <main>
            <!-- Hero Section -->
            <section class="pluma-section">
                <div class="pluma-container">
                    <div class="grid items-start gap-10 lg:grid-cols-12 lg:gap-12">
                        <!-- Left Column: Content -->
                        <div class="lg:col-span-7">
                            @if($heroSettings['hero.subtitle'] ?? null)
                                <div class="animate-fade-in-up inline-flex items-center gap-2 rounded-full border border-gray-200 bg-[rgb(var(--secondary))] px-4 py-2" data-testid="badge-hero">
                                    <span class="grid size-7 place-items-center rounded-full bg-white" data-testid="badge-hero-icon">
                                        <x-icons.sparkles class="size-4 text-[rgb(var(--accent))]" />
                                    </span>
                                    <span class="text-sm text-gray-500" data-testid="text-hero-kicker">
                                        {{ $heroSettings['hero.subtitle'] }}
                                    </span>
                                </div>
                            @endif

                            <h1 class="animate-fade-in-up animate-delay-100 mt-6 text-balance text-[clamp(2.5rem,5vw,4rem)] font-bold leading-[1.1] tracking-[-0.02em] text-[rgb(var(--primary))]" data-testid="text-hero-title">
                                {{ $heroSettings['hero.title'] ?? 'Find the right bottle for your moment.' }}
                            </h1>

                            @if($heroSettings['hero.description'] ?? null)
                                <p class="animate-fade-in-up animate-delay-200 mt-5 max-w-2xl text-[1.125rem] leading-[1.6] text-gray-500" data-testid="text-hero-subtitle">
                                    {{ $heroSettings['hero.description'] }}
                                </p>
                            @endif

                            <div class="animate-fade-in-up animate-delay-300 mt-8 flex flex-wrap gap-4">
                                <a
                                    href="{{ $heroSettings['hero.cta_url'] ?? '#' }}"
                                    class="h-14 rounded-lg bg-[rgb(var(--accent))] px-8 text-lg font-semibold text-white shadow-[var(--shadow-colored)] transition-all duration-200 hover:-translate-y-[2px] hover:bg-[rgb(var(--primary))] hover:shadow-[var(--shadow-medium)] inline-flex items-center justify-center"
                                    data-testid="button-cta-primary"
                                >
                                    {{ $heroSettings['hero.cta_text'] ?? 'Start your discovery' }}
                                    <x-icons.arrow-right class="ml-2 inline-block size-5" />
                                </a>
                                @if($heroSettings['hero.cta_secondary_text'] ?? null)
                                    <a
                                        href="{{ $heroSettings['hero.cta_secondary_url'] ?? '#' }}"
                                        class="h-14 rounded-lg border-2 border-gray-200 bg-transparent px-8 text-lg font-semibold transition-all duration-200 hover:-translate-y-[2px] hover:bg-[rgb(var(--secondary))] inline-flex items-center justify-center"
                                        data-testid="button-cta-secondary"
                                    >
                                        {{ $heroSettings['hero.cta_secondary_text'] }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Right Column: Image -->
                        <div class="lg:col-span-5">
                            <div class="animate-fade-in-up animate-delay-200 relative" data-testid="panel-hero-visual">
                                <div class="absolute -inset-6 rounded-[28px] bg-[radial-gradient(circle_at_20%_10%,rgba(59,155,143,0.18),transparent_45%),radial-gradient(circle_at_90%_40%,rgba(28,63,58,0.14),transparent_55%),radial-gradient(circle_at_30%_90%,rgba(235,232,216,0.65),transparent_55%)]" data-testid="bg-hero-gradient"></div>

                                <div class="relative overflow-hidden rounded-[28px] border border-gray-200 bg-white p-2" data-testid="card-hero-visual">
                                    @php
                                        $heroImage = $heroSettings['hero.image'] ?? 'https://funphotobooth.com.br/?s=62540867011700';
                                        $heroImageUrl = $heroSettings['hero.image_url'] ?? null;
                                    @endphp

                                    @if($heroImageUrl)
                                        <a href="{{ $heroImageUrl }}" target="_blank" rel="noopener noreferrer">
                                            <img
                                                src="{{ $heroImage }}"
                                                alt="{{ $heroSettings['hero.title'] ?? 'Hero Image' }}"
                                                class="w-full h-auto rounded-[20px] object-cover"
                                                data-testid="hero-image"
                                            />
                                        </a>
                                    @else
                                        <img
                                            src="{{ $heroImage }}"
                                            alt="{{ $heroSettings['hero.title'] ?? 'Hero Image' }}"
                                            class="w-full h-auto rounded-[20px] object-cover"
                                            data-testid="hero-image"
                                        />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <x-footer />
    </body>
</html>
