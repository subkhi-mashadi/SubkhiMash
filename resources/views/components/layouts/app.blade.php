<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? config('app.name', 'Portfolio') }}</title>
        <meta name="description" content="{{ $description ?? 'Portfolio developer — freelance & full-time remote.' }}">

        <meta property="og:title" content="{{ $title ?? config('app.name', 'Portfolio') }}">
        <meta property="og:description" content="{{ $description ?? 'Portfolio developer — freelance & full-time remote.' }}">
        <meta property="og:type" content="website">

        @php
            $personSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'Person',
                'name' => 'Subkhi Mashadi',
                'jobTitle' => 'Full-Stack Developer',
                'url' => url('/'),
                'sameAs' => [
                    'https://github.com/subkhi-mashadi',
                    'https://linkedin.com/in/yourhandle',
                ],
                'knowsAbout' => ['PHP', 'Laravel', 'JavaScript', 'MySQL', 'Web Development'],
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
