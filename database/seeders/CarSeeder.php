<?php


namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CarSeeder extends Seeder
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
                'user_id' => 2,
                'model_id' => 1,
                'car_registration_number' => '1234',
                'color' => 'Red'
            ],
            [
                'user_id' => 3,
                'model_id' => 2,
                'car_registration_number' => '2345',
                'color' => 'Blue'
            ],
            [
                'user_id' => 3,
                'model_id' => 3,
                'car_registration_number' => '3456',
                'color' => 'Yellow'
            ],
            [
                'user_id' => 4,
                'model_id' => 4,
                'car_registration_number' => '4567',
                'color' => 'Green'
            ],
        ]);
    }
}
