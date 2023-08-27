<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sparepart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'desc'     => [
                'type'           => 'TEXT'
            ],
            'price'     => [
                'type'           => 'DOUBLE'
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('m_sparepart');
    }

    public function down()
    {
        //
    }
}
