<?php

namespace App\Models;

use CodeIgniter\Model;

class AdoptionRequestModel extends Model
{
    protected $table = 'adoption_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'animal_id',
        'status',
        'income',
        'living_type',
        'has_pets',
        'reason',
        'created_at',
        'updated_at',
    ];
}
