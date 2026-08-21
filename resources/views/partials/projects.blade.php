@php
    $projects = \App\Models\Project::query()
        ->where('is_active', true)
        ->orderByDesc('created_at')
        ->get()
        ->map(fn ($p) => [
            'title' => $p->title,
            'stack' => $p->stack,
            'github' => $p->github,
            'live' => $p->live,
            'cover' => $p->cover_path
                ? (str_starts_with($p->cover_path, 'http') ? $p->cover_path : \Illuminate\Support\Facades\Storage::url($p->cover_path))
                : null,
            'problem' => ['id' => $p->problem_id, 'en' => $p->problem_en],
            'solution' => ['id' => $p->solution_id, 'en' => $p->solution_en],
            'result' => ['id' => $p->result_id, 'en' => $p->result_en],
        ]);
@endphp

<section id="projects" class="py-24">
    <div class="max-w-6xl mx-auto px-6">
        <p class="reveal text-indigo-600 dark:text-indigo-400 font-medium mb-2 text-center">{{ __('portfolio.projects.label') }}</p>
        <h2 class="reveal text-3xl font-bold mb-14 text-center">{{ __('portfolio.projects.title') }}</h2>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <article class="reveal group rounded-2xl border border-neutral-200 dark:border-white/10 bg-white dark:bg-neutral-900/40 overflow-hidden hover:border-indigo-400/40 transition">
                    <div class="aspect-video bg-gradient-to-br from-indigo-500/20 to-violet-500/10 flex items-center justify-center text-neutral-500 text-sm overflow-hidden">
                        @if ($project['cover'])
                            <img src="{{ $project['cover'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover">
                        @else
                            {{ $project['title'] }}
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-4">{{ $project['title'] }}</h3>

                        <dl class="space-y-3 mb-5 text-sm">
                            <div>
                                <dt class="text-xs font-medium text-neutral-500 uppercase tracking-wide">{{ __('portfolio.projects.problem') }}</dt>
                                <dd class="text-neutral-600 dark:text-neutral-400">{{ $project['problem'][app()->getLocale()] }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-neutral-500 uppercase tracking-wide">{{ __('portfolio.projects.solution') }}</dt>
                                <dd class="text-neutral-600 dark:text-neutral-400">{{ $project['solution'][app()->getLocale()] }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-emerald-600 dark:text-emerald-400 uppercase tracking-wide">{{ __('portfolio.projects.result') }}</dt>
                                <dd class="text-emerald-600 dark:text-emerald-400 font-medium">↑ {{ $project['result'][app()->getLocale()] }}</dd>
                            </div>
                        </dl>

                        <div class="flex flex-wrap gap-2 mb-5">
                            @foreach ($project['stack'] as $tech)
                                <span class="rounded-full bg-neutral-100 dark:bg-white/5 border border-neutral-200 dark:border-white/10 text-xs text-neutral-600 dark:text-neutral-300 px-2.5 py-1">{{ $tech }}</span>
                            @endforeach
                        </div>

                        <div class="flex gap-4 text-sm">
                            <a href="{{ $project['github'] }}" target="_blank" class="text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.projects.github') }} →</a>
                            <a href="{{ $project['live'] }}" target="_blank" class="text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.projects.live') }} →</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
