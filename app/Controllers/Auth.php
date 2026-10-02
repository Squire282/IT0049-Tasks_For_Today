<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Display login page
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/tasks');
        }

        $data['title'] = 'Login';

        return view('auth/login', $data);
    }


    // Process login
    public function attemptLogin()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username is required.'
                ]
            ],

            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password is required.'
                ]
            ]
        ];


        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }


        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();


        // Verify username and hashed password
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }


        // Regenerate session ID after successful login
        session()->regenerate();


        // Store user information in session
        session()->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'full_name' => $user['full_name'],
            'logged_in' => true
        ]);


        return redirect()->to('/tasks');
    }


    // Logout
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}