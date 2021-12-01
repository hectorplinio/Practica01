<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllFestivals extends Seeder
{
    public function run()
    {
        $this->call('CategoriesSeeder');
        $this->call('FestivalsSeeder');
    }
}
