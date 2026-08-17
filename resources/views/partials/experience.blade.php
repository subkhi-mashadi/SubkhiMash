@php
    $locale = app()->getLocale();
    $experiences = \App\Models\Experience::query()
        ->where('is_active', true)
        ->orderByDesc('started_at')
        ->get()
        ->map(fn ($exp) => [
            'role' => ['id' => $exp->role_id, 'en' => $exp->role_en],
            'company' => $exp->company,
            'period' => $exp->periodLabel(),
            'type' => ['id' => $exp->type_id, 'en' => $exp->type_en],
            'points' => ['id' => $exp->points_id, 'en' => $exp->points_en],
        ]);
@endphp

<section id="experience" class="py-24 bg-indigo-50 dark:bg-neutral-900/30">
    <div class="max-w-4xl mx-auto px-6">
        <p class="reveal text-indigo-600 dark:text-indigo-400 font-medium mb-2 text-center">{{ __('portfolio.experience.label') }}</p>
        <h2 class="reveal text-3xl font-bold mb-14 text-center">{{ __('portfolio.experience.title') }}</h2>

        <div class="space-y-10">
            @foreach ($experiences as $exp)
                <div class="reveal relative pl-8 border-l border-neutral-200 dark:border-white/10">
                    <span class="absolute -left-[5px] top-1.5 w-2.5 h-2.5 rounded-full bg-indigo-500 dark:bg-indigo-400"></span>
                    <div class="flex flex-wrap items-baseline justify-between gap-2 mb-1">
                        <h3 class="font-semibold text-lg">{{ $exp['role'][app()->getLocale()] }} · {{ $exp['company'] }}</h3>
                        <span class="text-sm text-neutral-500">{{ $exp['period'] }}</span>
                    </div>
                    <span class="inline-block text-xs text-emerald-600 dark:text-emerald-400 mb-3">{{ $exp['type'][app()->getLocale()] }}</span>
                    <ul class="list-disc list-inside text-neutral-600 dark:text-neutral-400 text-sm space-y-1">
                        @foreach ($exp['points'][app()->getLocale()] as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
