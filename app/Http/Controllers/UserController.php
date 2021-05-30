<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends BaseController
{

    /**
     * user profile
     */
    public function index() {

        $user = $this->getUserInSession();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * try login user
     */
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = $this->findUserByEmail($email);

        // invalid login
        if (empty($user) || $user['password'] != $password) {
            return View('login', ['error' => 'Email or password is invalid']);
        }

        // valid login - create user session
        $this->createUserSession($user);

        return redirect()->to('/music');
    }

    /**
     * logout user
     */
    public function logout()
    {
        $this->clearUserSession();
        return redirect()->to('/login');
    }

    /**
     * try register user
     */
    public function register(Request $request)
    {
        $email = $request->email;
        $user_name = $request->user_name;
        $password = $request->password;

        // invalid emial
        if ($this->hasEmailInDb($email)) {
            return View('register', ['error' => 'The email already exists']);
        }

        // valid register - store user and profile image
        $this->createUserInDb($email, $user_name, $password);

        // create user session
        $this->createUserSession([
            'email' => $email,
            'user_name' => $user_name
        ]);

        return redirect()->to('/music');
    }
}
