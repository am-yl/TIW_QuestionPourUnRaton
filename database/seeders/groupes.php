<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class groupes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupes')->insert([
            [
            'name' => 'Groupe automatique',
            'description' => 'Default'
            ],
            [
            'name' => 'Groupe 1',
            'description' => 'Potigroupe'
            ],
        ]);
    }
}
