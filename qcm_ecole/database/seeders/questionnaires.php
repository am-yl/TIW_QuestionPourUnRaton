<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class questionnaires extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionnaires')->insert([
            [
            'name' => 'Quizz 1',
            'description' => 'Quizz de test #1'
            ],
            [
            'name' => 'Quizz 2',
            'description' => 'Quizz de test #2'
            ],
        ]);
    }
}
