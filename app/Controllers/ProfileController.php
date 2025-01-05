<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class ProfileController extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->checkAuth();
    }

    private function checkAuth()
    {
        if (!session()->get('logged_in')) {
            $response = service('response');
            $response->setStatusCode(401);
            $response->setJSON(['error' => 'Please login to access this resource']);
            $response->send();
            exit;
        }
    }

    public function index()
    {
        $userModel = new UserModel();
        
        try {
            $userId = session()->get('user_id');
            
            $user = $userModel->select('id, email, full_name, phone_number, address, created_at')
                            ->where('id', $userId)
                            ->first();
            
            if (!$user) {
                return view('../errors/html/error_404'); // Render a 404 view for non-AJAX requests
            }
            
            $userData = [
                'id' => $user['id'],
                'email' => $user['email'],
                'full_name' => $user['full_name'],
                'phone_number' => $user['phone_number'],
                'address' => $user['address'],
                'member_since' => date('Y-m-d', strtotime($user['created_at']))
            ];
            
            return view('iqbal/profile', ['user' => $userData]); // Pass data to the view directly
            
        } catch (\Exception $e) {
            log_message('error', '[Profile::index] ' . $e->getMessage());
            return view('../errors/html/error_500'); // Render a 500 error view for exceptions
        }
    }



    // Fixed update method signature
    public function update($id = null)
    {
        // We'll use the session user_id instead of the URL parameter
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        
        $rules = [
            'full_name' => 'required|min_length[3]|max_length[100]',
            'phone_number' => 'required|min_length[10]|max_length[15]',
            'address' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('address')
        ];

        try {
            $userModel->update($userId, $data);
            
            return $this->respond([
                'status' => 200,
                'message' => 'Profile updated successfully',
                'data' => $data
            ]);
            
        } catch (\Exception $e) {
            log_message('error', '[Profile::update] ' . $e->getMessage());
            return $this->failServerError('Error updating profile');
        }
    }
}