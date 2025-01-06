<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCatsTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'breed' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],
            'health_status' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('cats');
    }

    public function down()
    {
        $this->forge->dropTable('cats');
    }
}
