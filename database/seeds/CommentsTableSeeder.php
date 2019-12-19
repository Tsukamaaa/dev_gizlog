<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Comment;

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
        factory(Comment::class, 100)->create();
    }
}
