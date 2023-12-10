<?php

namespace App\Http\Controllers;

use JsonException;

/**
 * Class AppleController
 * @package App\Http\Controllers
 */
class AppleController extends Controller
{
    /*** Handle the incoming request. */
    public function __invoke(string $pattern, int $index): void
    {
        while($index > strlen($pattern)) {
            $pattern .= $pattern;
        }
        try {
            $json = json_encode([[
                'color' => self::COLOR[$pattern[$index - 1]], 'index' => $index
            ]], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT
            );
            echo sprintf('<pre>%s</pre>', $json);
        } catch (JsonException $e) {
            echo '[ERROR]' . $e;
        }
    }

    /*** @var array */
    private const COLOR = [
        'r' => 'Red',
        'g' => 'Green',
        'y' => 'Yellow'
    ];
}
