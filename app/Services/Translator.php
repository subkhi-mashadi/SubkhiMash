<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Translator
{
    public static function translate(string $text, string $to = 'en', string $from = 'id'): string
    {
        if (trim($text) === '') {
            return '';
        }

        $response = Http::timeout(8)->get('https://translate.googleapis.com/translate_a/single', [
            'client' => 'gtx',
            'sl' => $from,
            'tl' => $to,
            'dt' => 't',
            'q' => $text,
        ]);

        $segments = $response->json()[0] ?? [];

        return collect($segments)->pluck(0)->implode('');
    }

    public static function translateMany(array $lines, string $to = 'en', string $from = 'id'): array
    {
        return array_map(fn ($line) => static::translate((string) $line, $to, $from), $lines);
    }
}
