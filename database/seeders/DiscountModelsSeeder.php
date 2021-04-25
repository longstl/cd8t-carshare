<?php


namespace Database\Seeders;

use App\Enums\EmailPreference;
use App\Enums\IdentificationType;
use App\Enums\Unit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DiscountModelsSeeder
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
                'make' => 'VINFAST LUX SA2.0', // hang xe
                'model' => 'SUV',// dong xe
                'make_year' => 2020
            ],
            [
                'make' => 'VINFAST LUX A2.0', // hang xe
                'model' => 'Sedan',// dong xe
                'make_year' => 2020
            ],
            [
                'make' => '530 M Sport', // hang xe
                'model' => 'Sedan',// dong xe
                'make_year' => 2021
            ],
            [
                'make' => 'BMW X5 xDrive40i MSport', // hang xe
                'model' => 'SUV',// dong xe
                'make_year' => 2021
            ],
            [
                'make' => 'BMW Z4 sDrive30i M-Sport', // hang xe
                'model' => 'Coupe',// dong xe
                'make_year' => 2021
            ]
        ]);
    }
}
