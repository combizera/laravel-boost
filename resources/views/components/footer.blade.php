<footer class="w-full lg:max-w-4xl max-w-[335px] text-sm mt-6">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-4 py-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
        <div class="text-[#706f6c] dark:text-[#A1A09A] text-center lg:text-left">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </div>

        @if($footerMenu && $footerMenu->activeItems->isNotEmpty())
            <nav class="flex items-center gap-4">
                @foreach($footerMenu->activeItems as $item)
                    <a
                        href="{{ $item->url }}"
                        @if(str_starts_with($item->url, 'http'))
                            target="_blank"
                            rel="noopener noreferrer"
                        @endif
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border @if($loop->last) border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b] @else border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] @endif rounded-sm text-sm leading-normal"
                    >
                        {{ $item->label }}
                    </a>
                @endforeach
            </nav>
        @endif
    </div>
</footer>
