<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStockToFoods extends Migration
{
    public function up()
    {
        $fields = [
            'stock' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
                'default'    => 0,  
            ],
        ];

        $this->forge->addColumn('foods', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('foods', 'stock');
    }
}
