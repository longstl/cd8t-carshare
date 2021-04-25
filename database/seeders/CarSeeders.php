<?php


namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CarSeeders extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            [
                'name' => 'BMW 320I M',
                'make' => 'sedan',
                'model' => 'G30',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BMW 420I M',
                'make' => 'Convertible',
                'model' => 'G30',
                'make_year' => 2016,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'C300 AMG',
                'make' => 'sedan',
                'model' => 'M137',
                'make_year' => 2019,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BMW 720I',
                'make' => 'sedan',
                'model' => 'F90',
                'make_year' => 2021,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'KIA MORNING',
                'make' => 'Hatchback',
                'model' => 'i1.2',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'TOYOTA VIOS ',
                'make' => 'sedan',
                'model' => 'G',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'TOYOTA INNOVA',
                'make' => 'Crossover',
                'model' => 'G',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Hyundai i20',
                'make' => 'Hatchback',
                'model' => 'I20',
                'make_year' => 2002,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Ford Fiesta',
                'make' => 'Hatchback',
                'model' => 'F1',
                'make_year' => 2015,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Ford Focus',
                'make' => 'sedan',
                'model' => 'I1.5 T ',
                'make_year' => 2009,
                'created_at' => Carbon::now()
            ], [
                'name' => 'Kia Forte',
                'make' => 'Hatchback',
                'model' => 'I30',
                'make_year' => 2019,
                'created_at' => Carbon::now()
            ], [
                'name' => 'TOYOTA FORTUNE',
                'make' => 'SUV',
                'model' => 'G',
                'make_year' => 2008,
                'created_at' => Carbon::now()
            ], [
                'name' => 'HONDA CRV',
                'make' => 'SUV',
                'model' => '1.5T',
                'make_year' => 2014,
                'created_at' => Carbon::now()
            ], [
                'name' => 'HONDA HRV',
                'make' => 'Crossover',
                'model' => 'IVT 1.5T',
                'make_year' => 2017,
                'created_at' => Carbon::now()
            ], [
                'name' => 'HONDA',
                'make' => 'CIVIC',
                'model' => 'IVT 1.5T',
                'make_year' => 2013,
                'created_at' => Carbon::now()
            ], [
                'name' => 'MAZDA 3',
                'make' => 'sedan',
                'model' => 'I1.5',
                'make_year' => 2015,
                'created_at' => Carbon::now()
            ], [
                'name' => 'MAZDA 6',
                'make' => 'sedan',
                'model' => 'G4',
                'make_year' => 2020,
                'created_at' => Carbon::now()
            ], [
                'name' => 'MAZDA CX5',
                'make' => 'crossover ',
                'model' => '2.5 premium',
                'make_year' => 2017,
                'created_at' => Carbon::now()
            ], [
                'name' => 'MAZDA 2',
                'make' => 'sedan',
                'model' => 'G3',
                'make_year' => 2013,
                'created_at' => Carbon::now()
            ], [
                'name' => ' Hyundai Tucson',
                'make' => 'crossover',
                'model' => 'G9',
                'make_year' => 2018,
                'created_at' => Carbon::now()
            ], [
                'name' => 'Lexus RX350 ',
                'make' => 'crossover',
                'model' => 'F3',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ], [
                'name' => 'Lexus LS250',
                'make' => 'sedan',
                'model' => 'I7',
                'make_year' => 2018,
                'created_at' => Carbon::now()
            ], [
                'name' => 'BMW M4',
                'make' => 'sedan',
                'model' => 'F90',
                'make_year' => 2014,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
