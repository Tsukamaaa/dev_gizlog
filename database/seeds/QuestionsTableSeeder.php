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
        factory(Question::class, 100)->create();
    }
}
