<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaSites extends Migration
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
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'imagem' => [
                'type'       => 'VARCHAR',
                'constraint' => '240',
                'null'       => true,
                'default'    => null,   
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],                     
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('sites');
    }

    public function down()
    {
        $this->forge->dropTable('sites');
    }
}
