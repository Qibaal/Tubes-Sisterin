<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'         => 'admin@admin.com',
            'password_hash' =>  password_hash('123456', PASSWORD_BCRYPT),
            'full_name'     => 'Admin',
            'phone_number'  => '088888888888',
            'address'       => 'Admin ST 1',
            'role'          => 'admin',
        ];

        $this->db->table('users')->insert($data);
    }
}
