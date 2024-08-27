<?php

if (!function_exists('transformName')) {
    function transformName($string)
    {
        $lowercasedString = preg_replace_callback('/\b\w/', function ($matches) {
            return strtolower($matches[0]);
        }, $string);
        return str_replace(' ', '_', $lowercasedString);
    }
}