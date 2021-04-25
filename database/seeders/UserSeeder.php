<?php

namespace Database\Seeders;

use App\Enums\IdentificationType;
use App\Enums\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('123456'),
                'first_name' => 'Quan',
                'last_name' => 'Do',
                'phone' => '0989810209',
                'email' => 'ngoccp@gmail.com',
                'address' => '8 Ton That Thuyet',
                'identification_type' => IdentificationType::CITIZEN_IDENTIFICATION,
                'identification_id' => '121498908098',
                'identification_valid_from' => Carbon::now(),
                'identification_valid_to' => Carbon::now(),
                'role' => Role::ADMIN,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
