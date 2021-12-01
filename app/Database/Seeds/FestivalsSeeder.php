<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class FestivalsSeeder extends Seeder
{
    public function run()
    {
        //$this->db->table('Festivals')->where("id > " ,0)->delete();
        //$this->db->query("ALTER TABLE Festivals AUTO_INCREMENT = 1");
        $faker = Factory::create();
        $FestivalsBuilder = $this->db->table('Festivals');

        $Festivals = [
            [   
                "name" => $faker->username,
                "email" => $faker->email,
                "date" => "2021-05-08 14:52:10",
                "price" => "50",
                "address" => $faker->city,
                "image_url" => $faker->image,
                "category_id" => 1
            ],
            [
                "name" => $faker->username,
                "email" => $faker->email,
                "date" => "2021-10-18 14:52:10",
                "price" => "50",
                "address" => $faker->address,
                "image_url" => $faker->image,
                "category_id" => 2
            ]
        ];
        $FestivalsBuilder -> insertBatch($Festivals);

    }
}
