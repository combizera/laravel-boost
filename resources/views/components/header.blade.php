<header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
    <nav class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <span class="font-medium dark:text-[#EDEDEC] text-[#1b1b18]">{{ config('app.name', 'Laravel') }}</span>
        </div>

        @if($headerMenu && $headerMenu->activeItems->isNotEmpty())
            <div class="flex items-center gap-4">
                @foreach($headerMenu->activeItems as $item)
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
            </div>
        @endif
    </nav>
</header>
