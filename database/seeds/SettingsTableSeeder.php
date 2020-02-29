<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5 ; $i++) { 
            Setting::create([
                'allow_public_quotation' => rand(0,1),
                'allow_public_scheduling' => rand(0,1),
            ]); 
        }
    }
}
