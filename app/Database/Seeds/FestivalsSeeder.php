<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class FestivalsSeeder extends Seeder
{
    public function run()
    {
        // $this->db->table('Festivals')->where("id > " ,0)->delete();
        // $this->db->query("ALTER TABLE Festivals AUTO_INCREMENT = 1");
        $faker = Factory::create();
        $FestivalsBuilder = $this->db->table('Festivals');

        $Festivals = [
            [   
                "name" => $faker->username,
                "email" => $faker->email,
                "date" => $faker->iso8601($min = 'now') ,
                "price" =>  $faker->dateTimeBetween('now', '+3 years')->format('Y-m-d H:i:s'),
                "address" => $faker->city,
                "image_url" => $faker->image,
                "category_id" => 1,
                "created_at" => new Time('now')

            ],
            [
                "name" => $faker->username,
                "email" => $faker->email,
                "date" =>  $faker->dateTimeBetween('now', '+3 years')->format('Y-m-d H:i:s'),
                "price" => $faker->numberBetween($min = 10, $max = 90),
                "address" => $faker->address,
                "image_url" => $faker->image,
                "category_id" => 2,
                "created_at" => new Time('now')

            ]
        ];
        $FestivalsBuilder -> insertBatch($Festivals);

    }
}
