<footer class="pluma-section pt-0">
    <div class="pluma-container">
        <div class="flex flex-col gap-6 border-t border-gray-200/70 py-8 md:flex-row md:items-center md:justify-between" data-testid="footer">
            <!-- Copyright -->
            <p class="text-center text-sm text-gray-500 md:text-left" data-testid="text-footer">
                © {{ date('Y') }} {{ config('app.name', 'Pluma Wine') }}. All rights reserved.
            </p>

            <!-- Footer Menu -->
            @if($footerMenu && $footerMenu->activeItems->isNotEmpty())
                <div class="flex flex-wrap items-center justify-center gap-3 md:justify-end" data-testid="footer-actions">
                    @foreach($footerMenu->activeItems as $item)
                        <a
                            href="{{ $item->url }}"
                            @if(str_starts_with($item->url, 'http'))
                                target="_blank"
                                rel="noopener noreferrer"
                            @endif
                            class="h-10 rounded-lg px-4 text-[rgb(var(--accent))] transition-colors hover:bg-[rgba(59,155,143,0.08)]"
                            data-testid="button-footer-{{ Str::slug($item->label) }}"
                        >
                            {{ $item->label }}
                        </a>
                    @endforeach
                </div>
            @else
                <!-- Default links when no menu is configured -->
                <div class="flex flex-wrap items-center justify-center gap-3 md:justify-end" data-testid="footer-actions">
                    <a
                        href="#"
                        class="h-10 rounded-lg px-4 text-[rgb(var(--accent))] transition-colors hover:bg-[rgba(59,155,143,0.08)]"
                        data-testid="button-footer-privacy"
                    >
                        Privacy
                    </a>
                    <a
                        href="#"
                        class="h-10 rounded-lg px-4 text-[rgb(var(--accent))] transition-colors hover:bg-[rgba(59,155,143,0.08)]"
                        data-testid="button-footer-contact"
                    >
                        Contact
                    </a>
                </div>
            @endif
        </div>
    </div>
</footer>
