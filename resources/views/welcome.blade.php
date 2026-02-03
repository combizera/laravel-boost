<x-layout :title="config('app.name', 'Laravel')">
    {{-- HERO --}}
    <x-hero :heroSettings="$heroSettings" />

    {{-- FEATURES --}}
    <x-features :features="$featuresSettings" />
</x-layout>
