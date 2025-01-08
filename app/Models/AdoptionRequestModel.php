<?php

namespace App\Models;

use CodeIgniter\Model;

class AdoptionRequestModel extends Model
{
    protected $table = 'adoption_requests';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    protected $allowedFields = [
        'user_id',
        'animal_id',
        'status',
        'income',
        'living_type',
        'has_pets',
        'reason'
    ];

    protected $validationRules = [
        'user_id' => 'required|numeric',
        'animal_id' => 'required|numeric',
        'income' => 'required|string',
        'living_type' => 'required|string',
        'has_pets' => 'required|boolean',
        'reason' => 'required|string',
        'status' => 'required|in_list[pending,approved,rejected]'
    ];
}