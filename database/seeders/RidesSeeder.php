<?php


namespace Database\Seeders;

use App\Enums\RideStatus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RidesSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rider')->insert([
            [
                'car_id' => 2,
                'travel_start_time' => '10:10',
                'origin_address' => '70 nguyen hoang, my dinh 2, ha noi',
                'origin_coordinate' => '',
                'destination_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'destination_coordinate' => '',
                'distance' => '1500km',
                'seats_available' => 4,
                'status' => RideStatus::PENDING
            ],
            [
                'car_id' => 3,
                'travel_start_time' => '10:10',
                'origin_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'origin_coordinate' => '',
                'destination_address' => 'mui ne, ca mau',
                'destination_coordinate' => '',
                'distance' => '1500km',
                'seats_available' => 4,
                'status' => RideStatus::PENDING
            ],
            [
                'car_id' => 4,
                'travel_start_time' => '10:10',
                'origin_address' => 'ngo 83/87 duong tan trieu moi, thanh xuan ha noi',
                'origin_coordinate' => '',
                'destination_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'destination_coordinate' => '',
                'distance' => '1500km',
                'seats_available' => 4,
                'status' => RideStatus::PENDING
            ],
            [
                'car_id' => 5,
                'travel_start_time' => '10:10',
                'origin_address' => '1000 duong lang, cau giay, ha noi',
                'origin_coordinate' => '',
                'destination_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'destination_coordinate' => '',
                'distance' => '1500km',
                'seats_available' => 4,
                'status' => RideStatus::PENDING
            ]
        ]);
    }
}
