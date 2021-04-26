<?php


namespace Database\Seeders;

use App\Enums\Unit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert([
            [
                'user_id' => 2, // 1 admin
                'title' => 'I want to hitchhike',
                'content' => 'help me'
            ],
            [
                'user_id' => 3, // 1 admin
                'title' => 'My model is broken',
                'content' => 'help me'
            ],
            [
                'user_id' => 4, // 1 admin
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
            [
                'user_id' => 4, // 1 admin
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
            [
                'user_id' => 4, // 1 admin
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
            [
                'user_id' => 5, // 1 admin
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
        ]);
    }
}
