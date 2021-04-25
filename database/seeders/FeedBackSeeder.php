<?php


namespace Database\Seeders;

use App\Enums\Unit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedBackSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->insert([
            [
                'user_id' => 2, // 1 admin
                'title' => 'I want to hitchhike',
                'content' => 'help me'
            ],
            [
                'user_id' => 3, // 1 admin
                'title' => 'My car is broken',
                'content' => 'help me'
            ],
            [
                'user_id' => 4, // 1 admin
                'title' => 'I do not have a car',
                'content' => 'help me'
            ],
            [
                'user_id' => 4, // 1 admin
                'title' => 'I do not have a car',
                'content' => 'help me'
            ],
            [
                'user_id' => 4, // 1 admin
                'title' => 'I do not have a car',
                'content' => 'help me'
            ],
            'user_id' => 5, // 1 admin
            'title' => 'I do not have a car',
            'content' => 'help me'
        ]);
    }
}
