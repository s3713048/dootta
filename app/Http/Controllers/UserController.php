<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class UserController extends BaseController
{
    /**
     * try login user
     */
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = $this->getUserByEmail($email);

        // invalid login
        if (empty($user) || $user['password'] != $password) {
            return redirect('user/login')
                        ->withErrors(['Email or passward is invalid'])
                        ->withInput();
        }

        // valid login - create user session
        $this->createUserSession($user);

        return redirect()->to('/heros');
    }

    /**
     * logout user
     */
    public function logout()
    {
        $this->clearUserSession();
        return redirect()->to('/user/login');
    }

    /**
     * try register user
     */
    public function register(RegisterRequest $request)
    {
        $email = $request->email;
        $user_name = $request->user_name;
        $password = $request->password;

        // create user in database
        $user = $this->createUser($email, $user_name, $password);

        // create user session
        $this->createUserSession($user);

        return redirect()->to('/heros');
    }
}
