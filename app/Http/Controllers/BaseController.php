<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    /**
     * store user data in session
     */
    protected function createUserSession($user)
    {
        session([
            'current_user' =>
            [
                'email' => $user['email'],
                'user_name' => $user['user_name']
            ]
        ]);
    }

    /**
     * clear user data in session
     */
    protected function clearUserSession()
    {
        session()->forget('current_user');
    }

    /**
     * get user data in session
     */
    protected function getUserInSession()
    {
        return session('current_user');
    }
}