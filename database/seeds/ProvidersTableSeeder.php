<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) { 
            Provider::create([
                'institution_id' => rand(1,10),
                'user_id' => rand(1,10),
                'ratings_summary_id' => rand(1,5),
                'setting_id' => rand(1,5),
            ]); 
        }
    }
}
