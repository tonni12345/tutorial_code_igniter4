<?php

namespace App\Controllers;

class Admin extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('AuthModels');
    }

    public function index()
    {
        $data = [];
        return view('login', $data);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($this->model->authenticate($username, $password)) {
            $sessionData = [
                'username' => $username,
                'isLoggedIn' => true
            ];
            session()->set("loginData", $sessionData);
            return redirect()->to('/admin');
        }

        return redirect()->back()->withInput()->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        session()->remove("loginData");
        return redirect()->to('/login');
    }
}
