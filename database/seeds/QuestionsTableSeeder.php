<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();
        DB::table('questions')->insert([
            [
                'user_id' => 4,
                'tag_category_id' => 'front',
                'title' => 'frontテスト',
                'content' => 'frontテスト',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ],
            [
                'user_id' => 4,
                'tag_category_id' => 'back',
                'title' => 'backテスト',
                'content' => 'backテスト',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ],
            [
                'user_id' => 4,
                'tag_category_id' => 'infra',
                'title' => 'infraテスト',
                'content' => 'infraテスト',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ],
            [
                'user_id' => 4,
                'tag_category_id' => 'infra',
                'title' => 'infraテスト',
                'content' => 'infraテスト',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ]
        ]);
    }
}
