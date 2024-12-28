<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimalModel extends Model
{
    protected $table = 'cats'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'breed', 'age', 'health_status', 'description', 'created_at', 'updated_at'];
}
