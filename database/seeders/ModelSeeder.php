<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([
            [
                'make' => 'sedan',
                'model' => 'G30',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'Convertible',
                'model' => 'G30',
                'make_year' => 2016,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'sedan',
                'model' => 'M137',
                'make_year' => 2019,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'sedan',
                'model' => 'F90',
                'make_year' => 2021,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'Hatchback',
                'model' => 'i1.2',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'sedan',
                'model' => 'G',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'Crossover',
                'model' => 'G',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'Hatchback',
                'model' => 'I20',
                'make_year' => 2002,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'Hatchback',
                'model' => 'F1',
                'make_year' => 2015,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'sedan',
                'model' => 'I1.5 T ',
                'make_year' => 2009,
                'created_at' => Carbon::now()
            ],
            [
                'make' => 'Hatchback',
                'model' => 'I30',
                'make_year' => 2019,
                'created_at' => Carbon::now()
            ], [
                'make' => 'SUV',
                'model' => 'G',
                'make_year' => 2008,
                'created_at' => Carbon::now()
            ], [
                'make' => 'SUV',
                'model' => '1.5T',
                'make_year' => 2014,
                'created_at' => Carbon::now()
            ], [
                'make' => 'Crossover',
                'model' => 'IVT 1.5T',
                'make_year' => 2017,
                'created_at' => Carbon::now()
            ], [
                'make' => 'CIVIC',
                'model' => 'IVT 1.5T',
                'make_year' => 2013,
                'created_at' => Carbon::now()
            ], [
                'make' => 'sedan',
                'model' => 'I1.5',
                'make_year' => 2015,
                'created_at' => Carbon::now()
            ], [
                'make' => 'sedan',
                'model' => 'G4',
                'make_year' => 2020,
                'created_at' => Carbon::now()
            ], [
                'make' => 'crossover ',
                'model' => '2.5 premium',
                'make_year' => 2017,
                'created_at' => Carbon::now()
            ], [
                'make' => 'sedan',
                'model' => 'G3',
                'make_year' => 2013,
                'created_at' => Carbon::now()
            ], [
                'make' => 'crossover',
                'model' => 'G9',
                'make_year' => 2018,
                'created_at' => Carbon::now()
            ], [
                'make' => 'crossover',
                'model' => 'F3',
                'make_year' => 2012,
                'created_at' => Carbon::now()
            ], [
                'make' => 'sedan',
                'model' => 'I7',
                'make_year' => 2018,
                'created_at' => Carbon::now()
            ], [
                'make' => 'sedan',
                'model' => 'F90',
                'make_year' => 2014,
                'created_at' => Carbon::now()
            ],
        ]);
        //
    }
}
