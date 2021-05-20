<?php

namespace App\Http\Controllers;

use App\Helpers\Cookie;
use App\Helpers\Redirect;
use App\Helpers\UserStorage;
use App\Http\Middleware\IsAuthenticatedMiddleware;
use App\Libraries\Controller;

class Logout extends Controller
{
    /**
     * Logout the authenticated user
     *
     * @return void
     */
    public function index(): void
    {
        if (IsAuthenticatedMiddleware::handle()) {
            UserStorage::removeUserById(Cookie::get('user_id'));
            Cookie::remove('user_id');
        }

        Redirect::to('/login');
    }
}
