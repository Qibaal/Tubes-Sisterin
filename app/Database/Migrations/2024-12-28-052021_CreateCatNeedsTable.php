<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCatNeedsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'breed' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'food' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'food_per_day' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'treatment' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'accessories' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'cage' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); 
        $this->forge->createTable('cat_needs');
    }

    public function down()
    {
        $this->forge->dropTable('cat_needs');
    }
}
