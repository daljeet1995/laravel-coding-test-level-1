<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;


class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
        $this->call([
            EventSeeder::class
        ]);
    }
}
