<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Institution;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) { 
            Institution::create([
                'name' => Str::random(5),
                'logo' => Str::random(10).'.jpg',
            ]); 
        }
    }
}
