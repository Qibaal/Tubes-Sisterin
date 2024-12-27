<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdoptionRequests extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TYPE livingtype AS ENUM ('apartment', 'house');");
        $this->db->query("CREATE TYPE req_status AS ENUM ('pending', 'approved', 'rejected');");

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'animal_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'income' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'living_type' => [
                'type' => 'livingtype',
                'null' => true,
            ],
            'has_pets' => [
                'type' => 'BOOLEAN',
                'null' => true,
            ],
            'reason' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'req_status',
                'default' => 'pending',
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('animal_id', 'animals', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('adoption_requests');
    }

    public function down()
    {
        $this->forge->dropTable('adoption_requests');
    }
}
