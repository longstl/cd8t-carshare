<?php


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

                'username' => 'Quan Do',
                'password' => Hash::make('abc123456'),
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
                'email_preference' => EmailPreference::ONLY_RIDE_EMAIL, // có cho thông báo gưior về email hay ko
                'email_verified_at' => 'phone',
                'is_smoking_allowed' => 'no',
                'is_pet_allowed' => 'yes',
                'music_preference' => 'nostop',
                'chitchat_preference'=> 'Talk about love',
                'role' => Role::User,
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
                'email_verified_at' => 'phone',
                'is_smoking_allowed' => 'no',
                'is_pet_allowed' => 'yes',
                'music_preference' => 'nostop',
                'chitchat_preference'=> 'Talk about love',
                'role' => Role::User
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
                'email_verified_at' => 'phone',
                'is_smoking_allowed' => 'no',
                'is_pet_allowed' => 'yes',
                'music_preference' => 'nostop',
                'chitchat_preference'=> 'Talk about love',
                'role' => Role::User
            ],
            [
                'username' => 'Nguyen Ngoc Thuan',
                'password' => Hash::make('abc123456'),
                'first_name' => 'Nguyen Ngoc',
                'last_name' => 'Thuan',
                'email' => 'nguyenngocthuan@gmail.com',
                'phone' => '0123456789',
                'address' => 'so 10 Ton That Thuyet, My Dinh, Ha Noi',
                'driving_license_number' => '0909090909',
                'driving_license_valid_from' => Carbon::now(),
                'driving_license_valid_to' => Carbon::now(),
                'identification_type' => IdentificationType::CITIZEN_IDENTIFICATION, //cmnd
                'identification_id' => '098765432',
                'identification_valid_from' => '2021-02-28',
                'identification_valid_to' => '2028-02-28',
                'email_preference' => EmailPreference::ONLY_RIDE_EMAIL, // có cho thông báo gưior về email hay ko
                'email_verified_at' => 'phone',
                'is_smoking_allowed' => 'no',
                'is_pet_allowed' => 'yes',
                'music_preference' => 'nostop',
                'chitchat_preference'=> 'Talk about love',
                'role' => Role::User
            ]

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
