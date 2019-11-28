<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Comments;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();
        DB::table('comments')->insert([
            [
                'user_id' => 4,
                'question_id' => 3,
                'comment' => 'これはCommentテーブルのコメント',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ],
            [
                'user_id' => 4,
                'question_id' => 3,
                'comment' => 'これはCommentテーブルのコメント',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ],
            [
                'user_id' => 4,
                'question_id' => 3,
                'comment' => 'これはCommentテーブルのコメント',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ],
            [
                'user_id' => 4,
                'question_id' => 3,
                'comment' => 'これはCommentテーブルのコメント',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ],
            [
                'user_id' => 4,
                'question_id' => 1,
                'comment' => 'これはCommentテーブルのコメント',
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ]
        ]);
    }
}
