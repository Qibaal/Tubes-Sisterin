<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'email',
        'password_hash',
        'full_name',
        'phone_number',
        'address',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // protected $validationRules = [
    //     'email' => 'required|valid_email|is_unique[users.email]',
    //     'password_hash' => 'required',
    //     'full_name' => 'required|min_length[3]|max_length[100]',
    //     'phone_number' => 'required|min_length[10]|max_length[15]',
    //     'address' => 'required',
    // ];
}
