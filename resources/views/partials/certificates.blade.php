@php
    $certificates = \App\Models\Certificate::query()->where('is_active', true)->orderByDesc('year')->get();
@endphp

<section id="certificates" class="py-24">
    <div class="max-w-6xl mx-auto px-6">
        <p class="reveal text-indigo-600 dark:text-indigo-400 font-medium mb-2 text-center">{{ __('portfolio.certificates.label') }}</p>
        <h2 class="reveal text-3xl font-bold mb-14 text-center">{{ __('portfolio.certificates.title') }}</h2>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($certificates as $cert)
                <a href="{{ $cert['url'] }}" target="_blank" class="reveal rounded-2xl border border-neutral-200 dark:border-white/10 bg-white dark:bg-neutral-900/40 p-6 hover:border-indigo-400/40 transition block">
                    <div class="w-10 h-10 rounded-lg bg-indigo-500/10 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-1">{{ $cert['title'] }}</h3>
                    <p class="text-sm text-neutral-500">{{ $cert['issuer'] }} · {{ $cert['year'] }}</p>
                    <span class="text-xs text-neutral-500 dark:text-neutral-400 mt-3 inline-block">{{ __('portfolio.certificates.verify') }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
