<?php

namespace App\Services;

use App\Models\Motivation;

class DailyMotivationService
{
    public function processMotivationalEmail()
    {
        $motivation = Motivation::latest()->first()->content;

        $lines = preg_split('/\R/', $motivation);
        $emailContent = [];
        foreach ($lines as $line) {
            if (!empty($line)) {
                $emailContent[] = $line;
            }
        }

        return $this->reformatMotivationData($emailContent);
    }

    private function reformatMotivationData($motivationArray) {
        $reformattedArray = [];

        foreach ($motivationArray as $string) {
            if (str_contains($string, ': ')) {
                [$key, $value] = array_map('trim', explode(': ', $string, 2));
                if ($key) {
                    // Use regular expression to find and remove key-value pairs
                    $cleanedString = $key == 'Closing' ? $this->cleanClosingText($value) : $value;
                    $reformattedArray[$key] = $cleanedString;
                }
            }
        }

        return $reformattedArray;
    }



    private function cleanClosingText($text) {
        // Step 1: Find and remove key-value pair outside of quotations
        $pattern1 = '/\bSalutation:\s*([^"]*?\[[^\]]+\])/';
        $text = preg_replace($pattern1, '', $text);

        // Step 2: Find and remove signature phrases
        $signaturePhrases = ['Sincerely', 'Best Regards', 'Kind Regards'];
        $signaturePattern = implode('|', $signaturePhrases);
        $pattern2 = '/(' . $signaturePattern . '),\s*\[[^\]]+\]/';
        $text = preg_replace($pattern2, '', $text);

        // Output the cleaned text
        return $text;
    }
}
