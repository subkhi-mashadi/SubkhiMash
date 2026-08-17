@php
    $navProfile = \App\Models\Profile::current();
    $cvUrl = $navProfile->cv_path ? \Illuminate\Support\Facades\Storage::url($navProfile->cv_path) : '/cv.pdf';
@endphp

<header
    x-data="{ open: false }"
    class="fixed top-0 inset-x-0 z-50 border-b border-neutral-200 dark:border-white/5 backdrop-blur-lg bg-white/70 dark:bg-neutral-950/70 transition-colors"
>
    <nav class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">
        <a href="#hero" class="font-semibold tracking-tight text-lg">
            SubkhiMash<span class="text-indigo-600 dark:text-indigo-400">.</span>
        </a>

        <ul class="hidden md:flex items-center gap-8 text-sm text-neutral-600 dark:text-neutral-300">
            <li><a href="#about" class="hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.nav.about') }}</a></li>
            <li><a href="#skills" class="hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.nav.skills') }}</a></li>
            <li><a href="#projects" class="hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.nav.projects') }}</a></li>
            <li><a href="#experience" class="hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.nav.experience') }}</a></li>
            <li><a href="#certificates" class="hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.nav.certificates') }}</a></li>
            <li><a href="#testimonials" class="hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.nav.testimonials') }}</a></li>
            <li><a href="#contact" class="hover:text-neutral-900 dark:hover:text-white transition">{{ __('portfolio.nav.contact') }}</a></li>
        </ul>

        <div class="hidden md:flex items-center gap-3">
            
            <div class="flex items-center rounded-full border border-neutral-200 dark:border-white/10 text-xs font-medium overflow-hidden">
                <a href="{{ route('lang.switch', 'id') }}" class="px-2.5 py-1.5 {{ app()->getLocale() === 'id' ? 'bg-neutral-900 dark:bg-white text-white dark:text-neutral-950' : 'text-neutral-600 dark:text-neutral-300' }}">ID</a>
                <a href="{{ route('lang.switch', 'en') }}" class="px-2.5 py-1.5 {{ app()->getLocale() === 'en' ? 'bg-neutral-900 dark:bg-white text-white dark:text-neutral-950' : 'text-neutral-600 dark:text-neutral-300' }}">EN</a>
            </div>

            <button onclick="toggleTheme()" aria-label="Toggle dark mode"
                class="w-9 h-9 flex items-center justify-center rounded-full border border-neutral-200 dark:border-white/10 text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 1020.354 15.354z"/>
                </svg>
            </button>

            <a href="{{ $cvUrl }}" target="_blank" class="rounded-full bg-neutral-900 dark:bg-white text-white dark:text-neutral-950 text-sm font-medium px-4 py-2 hover:bg-indigo-500 hover:text-white transition">
                {{ __('portfolio.nav.cv') }}
            </a>
        </div>

        <div class="md:hidden flex items-center gap-2">
            <div class="flex items-center rounded-full border border-neutral-200 dark:border-white/10 text-xs font-medium overflow-hidden">
                <a href="{{ route('lang.switch', 'id') }}" class="px-2 py-1.5 {{ app()->getLocale() === 'id' ? 'bg-neutral-900 dark:bg-white text-white dark:text-neutral-950' : 'text-neutral-600 dark:text-neutral-300' }}">ID</a>
                <a href="{{ route('lang.switch', 'en') }}" class="px-2 py-1.5 {{ app()->getLocale() === 'en' ? 'bg-neutral-900 dark:bg-white text-white dark:text-neutral-950' : 'text-neutral-600 dark:text-neutral-300' }}">EN</a>
            </div>
            <button onclick="toggleTheme()" aria-label="Toggle dark mode"
                class="w-9 h-9 flex items-center justify-center rounded-full border border-neutral-200 dark:border-white/10 text-neutral-600 dark:text-neutral-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 1020.354 15.354z"/>
                </svg>
            </button>
            <button @click="open = !open" class="text-neutral-800 dark:text-neutral-200" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </nav>

    <div x-show="open" x-cloak x-transition class="md:hidden border-t border-neutral-200 dark:border-white/5 bg-white dark:bg-neutral-950 px-6 py-4 space-y-3 text-sm">
        <a href="#about" @click="open=false" class="block text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white">{{ __('portfolio.nav.about') }}</a>
        <a href="#skills" @click="open=false" class="block text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white">{{ __('portfolio.nav.skills') }}</a>
        <a href="#projects" @click="open=false" class="block text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white">{{ __('portfolio.nav.projects') }}</a>
        <a href="#experience" @click="open=false" class="block text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white">{{ __('portfolio.nav.experience') }}</a>
        <a href="#certificates" @click="open=false" class="block text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white">{{ __('portfolio.nav.certificates') }}</a>
        <a href="#contact" @click="open=false" class="block text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white">{{ __('portfolio.nav.contact') }}</a>
        <a href="{{ $cvUrl }}" target="_blank" class="block rounded-full bg-neutral-900 dark:bg-white text-white dark:text-neutral-950 text-center font-medium px-4 py-2">{{ __('portfolio.nav.cv') }}</a>
    </div>
</header>
