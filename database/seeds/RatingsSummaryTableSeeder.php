<?php

use Illuminate\Database\Seeder;
use App\RatingsSummary;

class RatingsSummaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5 ; $i++) { 
            RatingsSummary::create([
                'avg' => rand(0,5).'.'.rand(0,99),
                'count' => rand(0,100),
            ]); 
        }
    }
}
