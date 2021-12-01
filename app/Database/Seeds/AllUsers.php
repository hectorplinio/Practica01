<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllUsers extends Seeder
{
    public function run()
    {
        $this->call('RolesSeeder');
        $this->call('UsersSeeder');

    }
}
