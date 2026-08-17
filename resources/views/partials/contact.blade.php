@php
    $profile = \App\Models\Profile::current();
@endphp

<section id="contact" class="py-24 bg-indigo-50 dark:bg-neutral-900/30">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <p class="reveal text-indigo-600 dark:text-indigo-400 font-medium mb-2">{{ __('portfolio.contact.label') }}</p>
        <h2 class="reveal text-3xl font-bold mb-4">{{ __('portfolio.contact.title') }}</h2>
        <p class="reveal text-neutral-600 dark:text-neutral-400 mb-10">
            {{ __('portfolio.contact.subtitle') }}
        </p>

        <form method="POST" action="{{ route('contact.store') ?? '#' }}" class="reveal grid gap-4 text-left">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="{{ __('portfolio.contact.name') }}" required
                    class="rounded-lg bg-white dark:bg-neutral-950 border border-neutral-200 dark:border-white/10 px-4 py-3 text-sm focus:outline-none focus:border-indigo-400">
                <input type="email" name="email" placeholder="{{ __('portfolio.contact.email') }}" required
                    class="rounded-lg bg-white dark:bg-neutral-950 border border-neutral-200 dark:border-white/10 px-4 py-3 text-sm focus:outline-none focus:border-indigo-400">
            </div>
            <input type="text" name="company" placeholder="{{ __('portfolio.contact.company') }}"
                class="rounded-lg bg-white dark:bg-neutral-950 border border-neutral-200 dark:border-white/10 px-4 py-3 text-sm focus:outline-none focus:border-indigo-400">
            <textarea name="message" rows="4" placeholder="{{ __('portfolio.contact.message') }}" required
                class="rounded-lg bg-white dark:bg-neutral-950 border border-neutral-200 dark:border-white/10 px-4 py-3 text-sm focus:outline-none focus:border-indigo-400"></textarea>
            <button type="submit" class="rounded-full bg-indigo-500 hover:bg-indigo-400 text-white font-medium px-6 py-3 transition justify-self-center">
                {{ __('portfolio.contact.send') }}
            </button>
        </form>

        <div class="reveal mt-10 flex flex-wrap justify-center gap-6 text-sm text-neutral-600 dark:text-neutral-400">
            @if ($profile->email)
                <a href="mailto:{{ $profile->email }}" class="hover:text-neutral-900 dark:hover:text-white transition">{{ $profile->email }}</a>
            @endif
            @if ($profile->whatsapp)
                <a href="{{ $profile->whatsapp }}" target="_blank" class="hover:text-neutral-900 dark:hover:text-white transition">WhatsApp</a>
            @endif
            @if ($profile->linkedin)
                <a href="{{ $profile->linkedin }}" target="_blank" class="hover:text-neutral-900 dark:hover:text-white transition">LinkedIn</a>
            @endif
            @if ($profile->github)
                <a href="{{ $profile->github }}" target="_blank" class="hover:text-neutral-900 dark:hover:text-white transition">GitHub</a>
            @endif
        </div>
    </div>
</section>
