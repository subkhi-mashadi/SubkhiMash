<?php

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => url('/'), 'priority' => '1.0'],
    ];

    $xml = '<'.'?xml version="1.0" encoding="UTF-8"?'.'>'."\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
    foreach ($urls as $url) {
        $xml .= '<url><loc>'.e($url['loc']).'</loc><changefreq>weekly</changefreq><priority>'.$url['priority'].'</priority></url>'."\n";
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

Route::get('/api/github-contributions', function (\Illuminate\Http\Request $request) {
    $username = 'subkhi-mashadi';
    $currentYear = (int) now()->year;
    $availableYears = [$currentYear, $currentYear - 1, $currentYear - 2, $currentYear - 3];

    $year = (int) $request->query('year', $currentYear);
    if (! in_array($year, $availableYears)) {
        $year = $currentYear;
    }

    $data = cache()->remember("github.contrib.$username.$year", now()->addHours(6), function () use ($username, $year) {
        $url = "https://github.com/users/{$username}/contributions?from={$year}-01-01&to={$year}-12-31";

        try {
            $html = Http::timeout(6)->get($url)->body();
        } catch (\Throwable $e) {
            return ['total' => null, 'cells' => []];
        }

        $total = null;
        if (preg_match('/([\d,]+)\s*\n\s*contributions?/i', $html, $m)) {
            $total = $m[1];
        }

        $cells = [];
        if (preg_match_all('/data-date="(\d{4}-\d{2}-\d{2})"[^>]*?data-level="(\d)"/', $html, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $cells[] = ['date' => $match[1], 'level' => (int) $match[2]];
            }
        }

        return ['total' => $total, 'cells' => $cells];
    });

    return response()->json($data);
})->name('github.contributions');

Route::get('/api/github-languages', function () {
    $username = 'subkhi-mashadi';

    $languageColors = [
        'PHP' => '#4F5D95',
        'Blade' => '#f7523f',
        'JavaScript' => '#f1e05a',
        'TypeScript' => '#3178c6',
        'Python' => '#3572A5',
        'Go' => '#00ADD8',
        'HTML' => '#e34c26',
        'CSS' => '#563d7c',
        'Shell' => '#89e051',
        'Dockerfile' => '#384d54',
        'Vue' => '#41b883',
        'Java' => '#b07219',
        'C++' => '#f34b7d',
        'Ruby' => '#701516',
        'Rust' => '#dea584',
        'Jupyter Notebook' => '#DA5B0B',
        'C' => '#555555',
    ];
    $fallbackColors = ['#818cf8', '#a5b4fc', '#6366f1', '#c4b5fd', '#4f46e5'];

    $languages = cache()->remember("github.languages.$username", now()->addHours(6), function () use ($username, $languageColors, $fallbackColors) {
        try {
            $repos = Http::withHeaders(['User-Agent' => 'portfolio-app'])
                ->timeout(6)
                ->get("https://api.github.com/users/{$username}/repos", ['per_page' => 100])
                ->json();
        } catch (\Throwable $e) {
            return [];
        }

        if (! is_array($repos)) {
            return [];
        }

        $totals = [];
        foreach ($repos as $repo) {
            if (! empty($repo['fork']) || empty($repo['languages_url'])) {
                continue;
            }

            try {
                $langs = Http::withHeaders(['User-Agent' => 'portfolio-app'])->timeout(6)->get($repo['languages_url'])->json();
            } catch (\Throwable $e) {
                continue;
            }

            if (! is_array($langs)) {
                continue;
            }

            foreach ($langs as $lang => $bytes) {
                $totals[$lang] = ($totals[$lang] ?? 0) + $bytes;
            }
        }

        $sum = array_sum($totals);
        if ($sum === 0) {
            return [];
        }

        arsort($totals);

        $i = 0;
        return collect($totals)->map(function ($bytes, $lang) use ($sum, $languageColors, $fallbackColors, &$i) {
            $color = $languageColors[$lang] ?? $fallbackColors[$i % count($fallbackColors)];
            $i++;

            return [
                'name' => $lang,
                'percent' => round($bytes / $sum * 100, 2),
                'color' => $color,
            ];
        })->values()->all();
    });

    return response()->json($languages);
})->name('github.languages');

Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['id', 'en']), 404);
    session(['locale' => $locale]);

    return back();
})->name('lang.switch');

Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'company' => ['nullable', 'string', 'max:255'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    ContactMessage::create($data);

    return back()->with('status', 'Pesan terkirim!');
})->name('contact.store');
