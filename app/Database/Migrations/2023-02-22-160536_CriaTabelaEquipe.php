<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaEquipe extends Migration
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
            'descricao' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('equipe');
    }

    public function down()
    {
        $this->forge->dropTable('equipe');
    }
}
