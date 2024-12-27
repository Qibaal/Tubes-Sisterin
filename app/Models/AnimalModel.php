<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimalModel extends Model
{
    protected $table = 'animals';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'age', 'description', 'created_at', 'updated_at'];
}
