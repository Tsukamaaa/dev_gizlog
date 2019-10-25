<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DailyReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('daily_reports')->truncate();
        DB::table('daily_reports')->insert([
            [
                'title'             => 'dailyreportのtitle',
                'user_id'           => '4',
                'content'           => 'ここは本文',
                'reporting_time'    => '20191021',
                'created_at'        => Carbon::create(2019, 10, 21),
                'updated_at'        => Carbon::create(2019, 10, 21),
            ]
        ]);
    }
}
