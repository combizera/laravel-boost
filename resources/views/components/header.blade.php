<header class="sticky top-0 z-40 border-b border-gray-200/70 bg-white/80 backdrop-blur">
    <div class="pluma-container flex h-16 items-center justify-between">
        <a href="/" class="flex items-center gap-2" data-testid="link-home">
            <div class="grid size-9 place-items-center rounded-[12px] bg-[rgb(var(--secondary))]" data-testid="badge-brand">
                <x-icons.wine class="size-5 text-[rgb(var(--primary))]" />
            </div>
            <div class="leading-tight">
                <div class="text-sm font-semibold tracking-[-0.02em]" data-testid="text-brand">
                    {{ config('app.name', 'Pluma Wine') }}
                </div>
                <div class="text-xs text-gray-500" data-testid="text-tagline">
                    Discover with confidence
                </div>
            </div>
        </a>

        @if($headerMenu && $headerMenu->activeItems->isNotEmpty())
            <nav class="hidden items-center gap-6 md:flex" aria-label="Primary">
                @foreach($headerMenu->activeItems as $item)
                    <a
                        href="{{ $item->url }}"
                        @if(str_starts_with($item->url, 'http'))
                            target="_blank"
                            rel="noopener noreferrer"
                        @endif
                        class="text-sm text-gray-500 transition-colors hover:text-[rgb(var(--primary))]"
                        data-testid="link-{{ Str::slug($item->label) }}"
                    >
                        {{ $item->label }}
                    </a>
                @endforeach
            </nav>
        @endif

        <button class="rounded-lg bg-[rgb(var(--accent))] px-5 py-2 font-semibold text-white shadow-[var(--shadow-colored)] transition-all duration-200 hover:-translate-y-[1px] hover:bg-[rgb(var(--primary))] hover:shadow-[var(--shadow-medium)]" data-testid="button-open-app">
            Explore
            <x-icons.arrow-right class="ml-2 inline-block size-4" />
        </button>
    </div>
</header>
