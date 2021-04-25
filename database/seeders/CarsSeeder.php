<?php


namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CarsSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'user' => 2,
                'model' => 1,
                'car_registration_number' => '1234',
                'color' => 'Red'
            ],
            [
                'user' => 3,
                'model' => 2,
                'car_registration_number' => '2345',
                'color' => 'Blue'
            ],
            [
                'user' => 3,
                'model' => 3,
                'car_registration_number' => '3456',
                'color' => 'Yellow'
            ],
            [
                'user' => 4,
                'model' => 4,
                'car_registration_number' => '4567',
                'color' => 'Green'
            ],
            [
                'user' => 5,
                'model' => 5,
                'car_registration_number' => '1234',
                'color' => 'Oranger'
            ]
        ]);
    }
}
