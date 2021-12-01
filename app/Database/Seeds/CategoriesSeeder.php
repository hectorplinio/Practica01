<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('Categories')->where("id > " ,0)->delete();
        $this->db->query("ALTER TABLE Categories AUTO_INCREMENT = 1");

        $CategoriesBuilder = $this->db->table('Categories');

        $Categories = [
            [
                "name" => "Electronic",
                "created_at" => new Time('now')
            ],
            [
                "name" => "House",
                "created_at" => new Time('now')
            ]
        ];
        
        $CategoriesBuilder -> insertBatch($Categories);
    }
}
