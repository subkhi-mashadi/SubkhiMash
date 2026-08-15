@php
    $skillGroups = \App\Models\Skill::query()
        ->where('is_active', true)
        ->orderBy('name')
        ->get()
        ->groupBy('group')
        ->map(fn ($skills) => $skills->pluck('name'));
@endphp

<section id="skills" class="py-24 border-t border-neutral-200 dark:border-white/5 bg-neutral-50 dark:bg-neutral-900/30">
    <div class="max-w-6xl mx-auto px-6">
        <p class="reveal text-indigo-500 dark:text-indigo-400 font-medium mb-2 text-center">{{ __('portfolio.skills.label') }}</p>
        <h2 class="reveal text-3xl font-bold mb-14 text-center">{{ __('portfolio.skills.title') }}</h2>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($skillGroups as $group => $skills)
                <div class="reveal rounded-2xl border border-neutral-200 dark:border-white/10 bg-white dark:bg-neutral-950/40 p-6">
                    <h3 class="font-semibold mb-4">{{ $group }}</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($skills as $skill)
                            <span class="rounded-full bg-neutral-100 dark:bg-white/5 border border-neutral-200 dark:border-white/10 text-sm text-neutral-600 dark:text-neutral-300 px-3 py-1">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
