@php
    $profile = \App\Models\Profile::current();
    $locale = app()->getLocale();
@endphp

<section id="about" class="relative py-24 overflow-hidden">
    <canvas id="about-canvas" class="absolute inset-0 w-full h-full opacity-90 dark:opacity-100"></canvas>

    <div class="relative z-10 max-w-6xl mx-auto px-6 grid md:grid-cols-5 gap-12 items-center">
        <div class="reveal aspect-square max-w-sm md:col-span-2">
            @if ($profile->photo_path)
                <img src="{{ \Illuminate\Support\Facades\Storage::url($profile->photo_path) }}" alt="{{ $profile->name }}" class="w-full h-full object-contain drop-shadow-2xl opacity-80">
            @else
                <div class="w-full h-full flex items-center justify-center text-neutral-500">
                    {{ __('portfolio.about.photo_placeholder') }}
                </div>
            @endif
        </div>

        <div class="reveal md:col-span-3">
            <p class="text-indigo-600 dark:text-indigo-400 font-medium mb-2">{{ __('portfolio.about.label') }}</p>
            <h2 class="text-3xl font-bold mb-6">{{ __('portfolio.about.title') }}</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4 leading-relaxed">
                {{ $locale === 'id' ? $profile->about_p1_id : $profile->about_p1_en }}
            </p>
            <p class="text-neutral-600 dark:text-neutral-400 mb-8 leading-relaxed">
                {{ $locale === 'id' ? $profile->about_p2_id : $profile->about_p2_en }}
            </p>

            <div class="grid grid-cols-3 gap-6 text-center">
                <div>
                    <p class="text-3xl font-bold">{{ $profile->stat_projects }}</p>
                    <p class="text-sm text-neutral-500 mt-1">{{ __('portfolio.about.stat_projects') }}</p>
                </div>
                <div>
                    <p class="text-3xl font-bold">{{ $profile->stat_years }}</p>
                    <p class="text-sm text-neutral-500 mt-1">{{ __('portfolio.about.stat_years') }}</p>
                </div>
                <div>
                    <p class="text-3xl font-bold">{{ $profile->stat_remote }}</p>
                    <p class="text-sm text-neutral-500 mt-1">{{ __('portfolio.about.stat_remote') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
