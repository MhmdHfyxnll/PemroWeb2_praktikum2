<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getPost()) {

            $user = $this->request->getPost('username');
            $pass = $this->request->getPost('password');

            if ($user == 'admin' && $pass == 'admin123') {
                session()->set('logged_in', true);
                return redirect()->to('/admin/artikel');
            }

            return redirect()->back()->with('error', 'Login gagal');
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}