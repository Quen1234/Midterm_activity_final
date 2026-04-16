<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // --- LOGIN SECTION ---

    public function login()
    {
        return view('auth/login');
    }

    public function process()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id'        => $data['id'],
                    'username'  => $data['username'],
                    'role'      => $data['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Username not found');
            return redirect()->to('/');
        }
    }

    // --- REGISTER SECTION (CREATE ACCOUNT) ---

    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $model = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $confpass = $this->request->getVar('confirmpassword');
        $role     = $this->request->getVar('role');

        // 1. Validation: Check if passwords match
        if ($password !== $confpass) {
            session()->setFlashdata('error', 'Passwords do not match!');
            return redirect()->to('/register');
        }

        // 2. Validation: Check if username already exists
        $userExists = $model->where('username', $username)->first();
        if ($userExists) {
            session()->setFlashdata('error', 'Username already taken!');
            return redirect()->to('/register');
        }

        // 3. Save User 
        // Note: Our UserModel automatically hashes the password using beforeInsert
        $model->save([
            'username' => $username,
            'password' => $password,
            'role'     => $role
        ]);

        session()->setFlashdata('msg', 'Account created! You can now login.');
        return redirect()->to('/');
    }

    // --- LOGOUT ---

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}