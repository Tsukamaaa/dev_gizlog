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
                'title' => 'テスト',
                'content' => 'テスト',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ]
        ]);
    }
}
