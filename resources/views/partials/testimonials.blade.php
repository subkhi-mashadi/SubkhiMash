@php
    $testimonials = \App\Models\Testimonial::query()
        ->where('is_active', true)
        ->orderByDesc('created_at')
        ->get()
        ->map(fn ($t) => [
            'name' => $t->name,
            'role' => $t->role,
            'quote' => ['id' => $t->quote_id, 'en' => $t->quote_en],
        ]);
@endphp

<section id="testimonials" class="py-24">
    <div class="max-w-6xl mx-auto px-6">
        <p class="reveal text-indigo-600 dark:text-indigo-400 font-medium mb-2 text-center">{{ __('portfolio.testimonials.label') }}</p>
        <h2 class="reveal text-3xl font-bold mb-14 text-center">{{ __('portfolio.testimonials.title') }}</h2>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($testimonials as $t)
                <figure class="reveal rounded-2xl border border-neutral-200 dark:border-white/10 bg-white dark:bg-neutral-900/40 p-6 flex flex-col">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-500 dark:text-indigo-400 mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.17 6A5.17 5.17 0 0 0 2 11.17V18h6.83v-6.83H4.66c.1-2.02 1.7-3.62 3.72-3.72V6h-1.2Zm10 0A5.17 5.17 0 0 0 12 11.17V18h6.83v-6.83h-4.17c.1-2.02 1.7-3.62 3.72-3.72V6h-1.2Z"/>
                    </svg>
                    <blockquote class="text-neutral-600 dark:text-neutral-300 text-sm leading-relaxed flex-1">
                        "{{ $t['quote'][app()->getLocale()] }}"
                    </blockquote>
                    <div class="mt-6">
                        <p class="font-semibold text-sm">{{ $t['name'] }}</p>
                        <p class="text-xs text-neutral-500">{{ $t['role'] }}</p>
                    </div>
                </figure>
            @endforeach
        </div>
    </div>
</section>
