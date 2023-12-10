<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /*** Handle the incoming request. */
    public function __invoke(Request $request): void
    {
        echo 'Success';
    }
}
