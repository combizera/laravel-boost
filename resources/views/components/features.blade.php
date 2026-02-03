@props(['features' => []])

<section id="notes" class="pluma-section bg-[rgb(var(--secondary))]">
    <div class="pluma-container">
        <div class="grid gap-8 lg:grid-cols-12 lg:gap-12">
            {{-- LEFT --}}
            <div class="lg:col-span-5">
                <p class="animate-fade-in-up text-xs font-medium uppercase tracking-[0.02em] text-gray-500" data-testid="text-notes-kicker">
                    {{ $features['features.kicker'] ?? 'Why Choose Us' }}
                </p>
                <h2 class="animate-fade-in-up animate-delay-100 mt-3 text-[clamp(1.75rem,3.5vw,2.5rem)] font-semibold leading-[1.2] tracking-[-0.01em]" data-testid="text-notes-title">
                    {{ $features['features.title'] ?? 'Clear, calm, and genuinely useful.' }}
                </h2>
                <p class="animate-fade-in-up animate-delay-200 mt-4 text-[1rem] leading-[1.6] text-gray-500" data-testid="text-notes-body">
                    {{ $features['features.description'] ?? 'We keep notes readable: fruit, structure, finish, and pairing — presented with generous whitespace so you can scan without effort.' }}
                </p>
            </div>

            {{-- RIGHT --}}
            <div class="lg:col-span-7">
                <div class="grid gap-4 md:grid-cols-2" data-testid="grid-features">
                    @php
                        $defaultFeatures = [
                            [
                                'id' => 'f1',
                                'icon' => 'grape',
                                'title' => 'Premium Selection',
                                'body' => 'Hand-picked grapes from our finest vineyards, ensuring exceptional quality in every bottle.'
                            ],
                            [
                                'id' => 'f2',
                                'icon' => 'award',
                                'title' => 'Award-Winning Quality',
                                'body' => 'Internationally recognized wines with medals from prestigious competitions worldwide.'
                            ],
                            [
                                'id' => 'f3',
                                'icon' => 'leaf',
                                'title' => 'Sustainable Practices',
                                'body' => 'Committed to eco-friendly farming methods that preserve our land for future generations.'
                            ],
                            [
                                'id' => 'f4',
                                'icon' => 'wine',
                                'title' => 'Traditional Methods',
                                'body' => 'Time-honored winemaking techniques passed down through generations of master vintners.'
                            ],
                        ];

                        $featuresList = [];
                        for ($i = 1; $i <= 4; $i++) {
                            if (isset($features["features.item_{$i}.title"])) {
                                $featuresList[] = [
                                    'id' => "f{$i}",
                                    'icon' => $features["features.item_{$i}.icon"] ?? 'wine',
                                    'title' => $features["features.item_{$i}.title"],
                                    'body' => $features["features.item_{$i}.description"] ?? '',
                                ];
                            }
                        }

                        $featuresList = !empty($featuresList) ? $featuresList : $defaultFeatures;
                    @endphp

                    @foreach($featuresList as $index => $feature)
                        <div class="animate-fade-in-up pluma-card pluma-card-hover border border-[rgb(var(--card-border))] bg-white p-8"
                             style="animation-delay: {{ ($index + 3) * 0.1 }}s; opacity: 0;"
                             data-testid="card-feature-{{ $feature['id'] }}">
                            <div class="flex items-start gap-4">
                                <div class="grid size-12 place-items-center rounded-2xl bg-[rgba(190,173,128,0.1)]" data-testid="icon-feature-{{ $feature['id'] }}">
                                    @switch($feature['icon'])
                                        @case('grape')
                                            <x-icons.grape class="size-6 text-[rgb(var(--accent))]" />
                                            @break
                                        @case('award')
                                            <x-icons.award class="size-6 text-[rgb(var(--accent))]" />
                                            @break
                                        @case('leaf')
                                            <x-icons.leaf class="size-6 text-[rgb(var(--accent))]" />
                                            @break
                                        @case('sparkles')
                                            <x-icons.sparkles class="size-6 text-[rgb(var(--accent))]" />
                                            @break
                                        @default
                                            <x-icons.wine class="size-6 text-[rgb(var(--accent))]" />
                                    @endswitch
                                </div>
                                <div class="min-w-0">
                                    <h3 class="text-[1.25rem] font-semibold leading-[1.3]" data-testid="text-feature-title-{{ $feature['id'] }}">
                                        {{ $feature['title'] }}
                                    </h3>
                                    <p class="mt-2 text-sm leading-[1.6] text-gray-500" data-testid="text-feature-body-{{ $feature['id'] }}">
                                        {{ $feature['body'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
