<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Festivals extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'unique'         => true,
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'unique'         => true,
            ],
            'date'       => [
                'type'           => 'DATETIME',
                'null'     => false,
            ],
            'price'       => [
                'type'           => 'FLOAT',
                'null'     => true,
            ],
            'address'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'image_url'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'category_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null' => true
            ],
            'created_at'       => [
                'type'           => 'DATETIME',
                'null'     => false,
            ],
            'updated_at'       => [
                'type'           => 'DATETIME',
                'null'     => true,
            ],
            'deleted_at'       => [
                'type'           => 'DATETIME',
                'null'     => true,
            ],

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->addForeignKey('category_id', 'Categories','id','CASCADE', 'SET NULL');
        $this->forge->createTable('Festivals');
        $this->db->enableForeignKeyChecks();

    }

    public function down()
    {
        $this->forge->dropTable('Festivals');

    }
}
