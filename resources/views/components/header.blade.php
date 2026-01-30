<header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
    <nav class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <span class="font-medium dark:text-[#EDEDEC] text-[#1b1b18]">{{ config('app.name', 'Laravel') }}</span>
        </div>

        <div class="flex items-center gap-4">
            <a
                href="{{ url('/') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Home
            </a>
            <a
                href="https://laravel.com/docs"
                target="_blank"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Docs
            </a>
            <a
                href="{{ url('/admin') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
            >
                Admin
            </a>
        </div>
    </nav>
</header>
