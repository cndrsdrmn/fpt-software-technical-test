<?php

namespace App\Support;

class FptHelper
{
    /**
     * Convert a string to alphabet soup.
     */
    public static function alphabetSoup(string $char): string
    {
        $char = preg_replace('/[^a-zA-Z]/', '', $char);

        $charachters = str_split($char);

        for ($i = 0; $i < count($charachters); $i++) {
            for ($j = 0; $j < count($charachters); $j++) {
                if ($charachters[$i] < $charachters[$j]) {
                    $temp = $charachters[$i];
                    $charachters[$i] = $charachters[$j];
                    $charachters[$j] = $temp;
                }
            }
        }

        return implode('', $charachters);
    }
}