<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Eleve',
                'surname' => 'One',
                'email' => 'eleve@one.fr',
                'role_id' => '2',
                'groupe_id' => '1',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Eleve',
                'surname' => 'Two',
                'email' => 'eleve@two.fr',
                'role_id' => '2',
                'groupe_id' => '1',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Prof',
                'surname' => 'One',
                'email' => 'prof@one.fr',
                'role_id' => '3',
                'groupe_id' => '2',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
