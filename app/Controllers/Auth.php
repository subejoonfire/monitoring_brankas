<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function attempt()
    {
        $email = $this->request->getPost('email');
        $pass  = $this->request->getPost('password');

        $model = new AdminModel();
        if ($model->verify($email, $pass)) {
            session()->set('admin', $email);
            return redirect()->to('dashboard');
        }
        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
