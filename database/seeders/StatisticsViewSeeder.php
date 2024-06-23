<?php

namespace Database\Seeders;

use App\Models\StatisticsView;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticsViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for($a=1; $a<=12; $a++){
            for($b=1; $b<=cal_days_in_month(CAL_GREGORIAN, $a, 2024);$b++)
            StatisticsView::insert([
                'date' => '2024-'.$a.'-'.$b.' 00:00:00',
                'totalViews' => rand(1000, 2000),
            ]);
        }
    }
}
