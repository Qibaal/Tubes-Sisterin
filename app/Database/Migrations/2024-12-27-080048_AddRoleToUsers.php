<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleToUsers extends Migration
{
    public function up()
    {
        // Create the ENUM type
        $this->db->query("CREATE TYPE user_role AS ENUM ('admin', 'user');");

        // Add the 'role' column
        $this->forge->addColumn('users', [
            'role' => [
                'type' => 'user_role',
                'default' => 'user',
            ],
        ]);
    }

    public function down()
    {
        // Remove the 'role' column
        $this->forge->dropColumn('users', 'role');

        // Drop the ENUM type
        $this->db->query("DROP TYPE user_role;");
    }
}
