<?php

namespace App\Models;

use CodeIgniter\Model;

class CatNeedsModel extends Model
{
    protected $table = 'cat_needs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['breed', 'food', 'food_per_day', 'treatment', 'accessories', 'cage'];
}
