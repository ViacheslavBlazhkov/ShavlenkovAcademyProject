<?php

namespace App\Http\Controllers;

use JetBrains\PhpStorm\NoReturn;
use JsonException;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /*** Handle the incoming request. */
    public function __invoke(string $lastName, string $firstName): void
    {
        try {
            $json = json_encode(['user' => [
                'last_name' => $lastName, 'first_name' => $firstName
            ]], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT
            );
            echo sprintf('<pre>%s</pre>', $json);
        } catch (JsonException $e) {
            echo '[ERROR]' . $e;
        }
    }
}
