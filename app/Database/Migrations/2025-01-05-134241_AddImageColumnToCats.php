<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageColumnToCats extends Migration
{
    public function up()
    {
        $this->forge->addColumn('cats', [
            'image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('cats', 'image');
    }
}
