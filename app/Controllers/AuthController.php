<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class AuthController extends ResourceController
{
    protected $format = 'json';

    public function showSignUpForm() 
    {
        return view('iqbal/auth/signup.php');
    }

    public function showLoginForm() 
    {
        return view('iqbal/auth/login.php');
    }


    public function signup()
    {
        $userModel = new UserModel();

        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'full_name' => 'required|min_length[3]|max_length[100]',
            'phone_number' => 'required|min_length[10]|max_length[15]',
            'address' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'full_name' => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('address'),
        ];

        try {
            $userModel->insert($data);
            return redirect()->to('/sugency/login');
        } catch (\Exception $e) {
            log_message('error', '[Auth::signup] ' . $e->getMessage());
            return redirect()->to('/sugency/signup');
        }
    }

    public function login()
    {
        $userModel = new UserModel();

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return $this->failNotFound('Email not found.');
        }

        if (!password_verify($password, $user['password_hash'])) {
            return $this->failUnauthorized('Invalid password.');
        }

        $sessionData = [
            'user_id' => $user['id'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'is_admin' => $user['role'] === 'admin',
            'logged_in' => true,
        ];

        session()->set($sessionData);

        return redirect()->to('/sugency/adoption');
    }

    public function logout()
    {
        if (!session()->get('logged_in')) {
            return $this->failUnauthorized('No active session found.');
        }

        session()->destroy();
        return redirect()->to('/sugency/login');
    }
}
