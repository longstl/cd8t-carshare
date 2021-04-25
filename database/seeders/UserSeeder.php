<?php

namespace Database\Seeders;

use App\Enums\ChitChatPreference;
use App\Enums\EmailPreference;
use App\Enums\IdentificationType;
use App\Enums\MusicPreference;
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
                'first_name' => 'Do',
                'last_name' => 'Quan',
                'email' => 'quando@gmail.com',
                'phone' => '0968686868',
                'address' => '70 Nguyen Hoang, My Dinh, Ha Noi',
                'driving_license_number' => '098765432',
                'driving_license_valid_from' => '2021-02-28',
                'driving_license_valid_to' => '2028-02-28',
                'identification_type' => IdentificationType::CITIZEN_IDENTIFICATION, //cmnd
                'identification_id' => '098765432',
                'identification_valid_from' => Carbon::now(),
                'identification_valid_to' => Carbon::now(),
                'email_preference' => EmailPreference::ONLY_RIDE_EMAIL,
                'is_smoking_allowed' => false,
                'is_pet_allowed' => true,
                'music_preference' => MusicPreference::NONE,
                'chitchat_preference'=> ChitChatPreference::NONE,
                'role' => Role::ADMIN,
            ],
            [
                'username' => 'Hoang Dac Phuong',
                'password' => Hash::make('abc123456'),
                'first_name' => 'Hoang Dac',
                'last_name' => 'Phuong',
                'email' => 'hoangdacphuong@gmail.com',
                'phone' => '0979999999',
                'address' => 'so 8 Ton That Thuyet, My Dinh, Ha Noi',
                'driving_license_number' => '098765432',
                'driving_license_valid_from' => '2021-02-28',
                'driving_license_valid_to' => '2028-02-28',
                'identification_type' => IdentificationType::CITIZEN_IDENTIFICATION, //cmnd
                'identification_id' => '098765432',
                'identification_valid_from' => Carbon::now(),
                'identification_valid_to' => Carbon::now(),
                'email_preference' => EmailPreference::ONLY_RIDE_EMAIL, // có cho thông báo gưior về email hay ko
                'is_smoking_allowed' => false,
                'is_pet_allowed' => true,
                'music_preference' => MusicPreference::CALM,
                'chitchat_preference'=> ChitChatPreference::NONE,
                'role' => Role::USER,
            ],
            [
                'username' => 'Pham Thang',
                'password' => Hash::make('abc123456'),
                'first_name' => 'Pham',
                'last_name' => 'Thang',
                'email' => 'phamthang@gmail.com',
                'phone' => '0123456789',
                'address' => 'so 9 Ton That Thuyet, My Dinh, Ha Noi',
                'driving_license_number' => '098765432',
                'driving_license_valid_from' => '2021-02-28',
                'driving_license_valid_to' => '2028-02-28',
                'identification_type' => IdentificationType::CITIZEN_IDENTIFICATION, //cmnd
                'identification_id' => '098765432',
                'identification_valid_from' => Carbon::now(),
                'identification_valid_to' => Carbon::now(),
                'email_preference' => EmailPreference::ONLY_RIDE_EMAIL, // có cho thông báo gưior về email hay ko
                'is_smoking_allowed' => true,
                'is_pet_allowed' => false,
                'music_preference' => MusicPreference::LOUD,
                'chitchat_preference'=> ChitChatPreference::NONE,
                'role' => Role::USER,
            ],
            [
                'username' => 'Nguyen Ngoc Thuan',
                'password' => Hash::make('abc123456'),
                'first_name' => 'Nguyen Ngoc',
                'last_name' => 'Thuan',
                'email' => 'nguyenngocthuan@gmail.com',
                'phone' => '0123456799',
                'address' => 'so 10 Ton That Thuyet, My Dinh, Ha Noi',
                'driving_license_number' => '0909090909',
                'driving_license_valid_from' => Carbon::now(),
                'driving_license_valid_to' => Carbon::now(),
                'identification_type' => IdentificationType::CITIZEN_IDENTIFICATION, //cmnd
                'identification_id' => '098765432',
                'identification_valid_from' => '2021-02-28',
                'identification_valid_to' => '2028-02-28',
                'email_preference' => EmailPreference::ONLY_RIDE_EMAIL, // có cho thông báo gưior về email hay ko
                'is_smoking_allowed' => false,
                'is_pet_allowed' => false,
                'music_preference' => MusicPreference::CALM,
                'chitchat_preference'=> ChitChatPreference::NONE,
                'role' => Role::USER,
            ]
        ]);
    }
}
