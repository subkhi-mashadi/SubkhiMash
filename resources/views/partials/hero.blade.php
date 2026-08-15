@php
    $profile = \App\Models\Profile::current();
@endphp

<section id="hero" class="relative min-h-screen flex items-center overflow-hidden pt-24">
    <canvas id="hero-canvas" class="absolute inset-0 w-full h-full opacity-60 dark:opacity-100"></canvas>

    <div class="absolute inset-0 bg-gradient-to-b from-white/0 via-white/40 to-white dark:from-neutral-950/0 dark:via-neutral-950/40 dark:to-neutral-950 pointer-events-none"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 w-full">
        <p class="reveal text-indigo-500 dark:text-indigo-400 font-medium mb-4 tracking-wide">{{ __('portfolio.hero.greeting') }}</p>
        <h1 class="reveal text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight max-w-3xl">
            Subkhi Mashadi — <span class="text-neutral-500 dark:text-neutral-400">{{ __('portfolio.hero.role') }}</span>
        </h1>
        <p class="reveal mt-6 text-lg text-neutral-600 dark:text-neutral-400 max-w-xl">
            {{ __('portfolio.hero.subtitle') }}
        </p>

        <div class="reveal mt-8 flex flex-wrap gap-4">
            <a href="#projects" class="rounded-full bg-indigo-500 hover:bg-indigo-400 text-white font-medium px-6 py-3 transition">
                {{ __('portfolio.hero.cta_projects') }}
            </a>
            <a href="#contact" class="rounded-full border border-neutral-300 dark:border-white/15 hover:border-neutral-500 dark:hover:border-white/40 text-neutral-900 dark:text-white font-medium px-6 py-3 transition">
                {{ __('portfolio.hero.cta_contact') }}
            </a>
            <a href="{{ $profile->cv_path ? \Illuminate\Support\Facades\Storage::url($profile->cv_path) : '/cv.pdf' }}" target="_blank" class="rounded-full border border-neutral-300 dark:border-white/15 hover:border-neutral-500 dark:hover:border-white/40 text-neutral-900 dark:text-white font-medium px-6 py-3 transition">
                {{ __('portfolio.hero.cta_cv') }}
            </a>
        </div>

        <div class="reveal mt-16 flex items-center gap-6 text-neutral-500">
            @if ($profile->github)
                <a href="{{ $profile->github }}" target="_blank" class="hover:text-neutral-900 dark:hover:text-white transition" aria-label="GitHub">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M12 .5C5.73.5.5 5.73.5 12a11.5 11.5 0 0 0 7.86 10.94c.58.1.79-.25.79-.56v-2.17c-3.2.7-3.88-1.4-3.88-1.4-.53-1.34-1.29-1.7-1.29-1.7-1.05-.72.08-.7.08-.7 1.17.08 1.78 1.2 1.78 1.2 1.03 1.77 2.71 1.26 3.37.96.1-.75.4-1.26.72-1.55-2.56-.29-5.25-1.28-5.25-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.79 0c2.2-1.49 3.18-1.18 3.18-1.18.63 1.59.23 2.76.11 3.05.74.81 1.18 1.84 1.18 3.1 0 4.43-2.7 5.4-5.27 5.69.42.36.78 1.08.78 2.18v3.24c0 .31.21.67.8.56A11.5 11.5 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5Z"/></svg>
                </a>
            @endif
            @if ($profile->linkedin)
                <a href="{{ $profile->linkedin }}" target="_blank" class="hover:text-neutral-900 dark:hover:text-white transition" aria-label="LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.85 0-2.14 1.44-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12ZM7.12 20.45H3.56V9h3.56v11.45Z"/></svg>
                </a>
            @endif
            <span class="text-sm">{{ __('portfolio.hero.scroll') }}</span>
        </div>
    </div>
</section>
