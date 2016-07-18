<?php

declare(strict_types = 1);


/**
 * CSS color validation.
 * Returns true, if passed string is correct CSS color.
 *
 * @param string $color Color string
 *
 * @return bool
 */
function isValidColor(string $color) : bool
{
    $color = str_replace(["\f", "\n", "\r", "\t", "\v", ' '], '', strtolower($color));
    $textColors = [
        'transparent', 'white', 'silver', 'gray', 'black', 'maroon', 'red', 'orange', 'yellow',
        'olive', 'lime', 'green', 'aqua', 'blue', 'navy', 'teal', 'fuchsia', 'purple'
    ];

    return in_array($color, $textColors, true) ?: (bool) preg_match('#^(?:\#[\da-f]{3}|[\da-f]{6})|(?:rgb(a)?\((?:(?:1?\d{1,2}|2(5)?(?(2)[0-5]|[0-4]\d)),){2}(?:1?\d{1,2}|2(5)?(?(3)[0-5]|[0-4]\d))(?(1),(?:1(?:\.0+)?|0?\.\d+))\))|(?:hsl(a)?\((?:[1-2]?\d{1,2}|3[0-5]\d),1?\d{1,2}%,1?\d{1,2}%(?(4),(?:1(?:\.0+)?|0?\.\d+))\))$#i', $color);
}



var_dump(
    isValidColor('   white   '), // true
    isValidColor('red'),         // true
    isValidColor('notcolor'),    // false

    isValidColor('rgb(255,255,255)'), // true
    isValidColor('rgb(255,500,255)'), // false
    isValidColor('rgb(255)'),         // false

    isValidColor('rgba(255,255,255,.4)'),  // true
    isValidColor('rgba(255,255,255,0.4)'), // true
    isValidColor('rgba(255,255,255,2.4)'), // true
    isValidColor('rgba(255,255,255,0)'),   // false
    isValidColor('rgba(0,0,0)')            // false
);
