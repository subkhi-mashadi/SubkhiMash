<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="8maWVCsEgqucDu2K0ulOh7FC-05mpcJoKSj6p8IWEqw" />
        <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}?v={{ filemtime(public_path('assets/logo.png')) }}">

        @php
            $seoProfile = \App\Models\Profile::current();
            $seoTitle = $title ?? 'Subkhi Mashadi — Fullstack Laravel Developer';
            $seoDescription = $description ?? 'Portfolio Subkhi Mashadi, Fullstack Developer spesialis Laravel & PHP. Siap direkrut untuk posisi remote full-time maupun proyek freelance.';
            $seoImage = $seoProfile->photo_path ? \Illuminate\Support\Facades\Storage::url($seoProfile->photo_path) : null;
        @endphp

        <title>{{ $seoTitle }}</title>
        <meta name="description" content="{{ $seoDescription }}">
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="Laravel Developer, Fullstack Developer Laravel, PHP Developer, Laravel Programmer Indonesia, Remote Laravel Developer, FilamentPHP Developer">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:locale" content="{{ app()->getLocale() === 'id' ? 'id_ID' : 'en_US' }}">
        @if ($seoImage)
            <meta property="og:image" content="{{ $seoImage }}">
        @endif

        <meta name="twitter:card" content="{{ $seoImage ? 'summary_large_image' : 'summary' }}">
        <meta name="twitter:title" content="{{ $seoTitle }}">
        <meta name="twitter:description" content="{{ $seoDescription }}">
        @if ($seoImage)
            <meta name="twitter:image" content="{{ $seoImage }}">
        @endif

        @php
            $personSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'Person',
                'name' => 'Subkhi Mashadi',
                'jobTitle' => 'Fullstack Laravel Developer',
                'description' => 'Fullstack Developer spesialis Laravel, PHP, dan FilamentPHP. Berpengalaman membangun aplikasi web untuk kebutuhan startup dan enterprise.',
                'url' => url('/'),
                'image' => $seoImage,
                'sameAs' => array_values(array_filter([
                    $seoProfile->github,
                    $seoProfile->linkedin,
                ])),
                'knowsAbout' => ['PHP', 'Laravel', 'FilamentPHP', 'JavaScript', 'MySQL', 'REST API', 'Web Development'],
            ];
        @endphp
        <script type="application/ld+json">{!! json_encode($personSchema) !!}</script>

        <script>
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white dark:bg-neutral-950 text-neutral-900 dark:text-neutral-100 antialiased transition-colors" x-data>
        {{ $slot }}
    </body>
</html>
