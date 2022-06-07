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
            'reponses' => '{"rep1":true,"rep2":false,"rep3":false,"rep4":true}',
            'questionnaire_id' => 1
            ]
        ]);
    }
}
