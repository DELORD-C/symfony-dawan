<?php

namespace App\Service;

class Sapin
{
    public function default (int $height): string
    {
        $str = "<pre>";
        for ($i = 1; $i <= $height; $i++) {
            $str .= "<p>";
            for ($j = $height + 1 - $i; $j > 0; $j--) {
                $str .= " ";
            }
            for ($k = $i * 2 - 1; $k > 0; $k--) {
                $str .= "*";
            }
            $str .= "</p>";
        }
        return $str . "</pre>";
    }
}