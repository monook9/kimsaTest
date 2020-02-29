<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Raul',
            'last_names' => 'Ojeda Meneses',
            'avatar' => 'raul.jpg',	
        ]);

        for ($i=0; $i < 9 ; $i++) { 
            User::create([
                'first_name' => Str::random(5),
                'last_names' => Str::random(8) . ' ' . Str::random(8),
                'avatar' => Str::random(10).'.jpg',	
            ]); 
        }
    }
}
