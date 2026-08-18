<footer class="py-8">
    <div class="max-w-6xl mx-auto px-6 flex flex-wrap items-center justify-between gap-4 text-sm text-neutral-500">
        <div class="flex items-center gap-4">
            <img src="{{ asset('assets/logo.gif') }}" alt="SubkhiMash" class="h-6 w-6 object-contain" loading="lazy">
            <p>&copy; {{ date('Y') }} Subkhi Mashadi. {{ __('portfolio.footer.rights') }}</p>
        </div>
        <p>{{ __('portfolio.footer.built') }}</p>
    </div>
</footer>
