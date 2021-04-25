<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ModelsSeeder::class,
            FeedBackSeeder::class,
            RidesSeeder::class,
            CarsSeeder::class
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
