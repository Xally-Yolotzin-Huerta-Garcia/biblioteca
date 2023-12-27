<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TLibros extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'autor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'editorial' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'isbn' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'precio' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('t_libros');
    }

    public function down()
    {
        $this->forge->dropTable('t_libros');
    }
}
