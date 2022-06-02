<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create();
        for($i = 1; $i <=5 ; $i++)
        {
       $Event = new Event;
       $Event->name = $Faker->name;
        $Event->slug = $Faker->slug;
        $Event->save();  
        }
    }
}
