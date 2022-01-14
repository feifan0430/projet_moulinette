<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipe')->insert([
            'Nom' => 'EQUIPE1'
        ]);
        DB::table('equipe')->insert([
            'Nom' => 'EQUIPE2'
        ]);
    }
}
