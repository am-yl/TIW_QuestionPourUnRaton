<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class questions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
            'name' => 'intitulé',
            'reponses' => '{"answers": ["réponse 1","réponse 2","réponse 3"],"correctAnswers" : [0]}',
            'questionnaire_id' => 1
            ]
        ]);
    }
}
