<?php
declare(strict_types=1);

namespace App\Services;

class DataProcessor 
{
    public function areAllElementsLessThan(array $numbers, int $k): bool 
    {
        foreach ($numbers as $number) {
            if ($number >= $k) {
                return false;
            }
        }
        return true;
    }

    public function swapFirstAndLastWord(string $text): string 
    {
        $words = preg_split('/\s+/', trim($text));
        $count = count($words);
        if ($count <= 1) {
            return $text;
        }
        $temp = $words[0];
        $words[0] = $words[$count - 1];
        $words[$count - 1] = $temp;
        return implode(' ', $words);
    }

    public function shuffleAllWords(string $text): string 
    {
        $words = explode(' ', trim($text));
        shuffle($words);
        return implode(' ', $words);
    }
}