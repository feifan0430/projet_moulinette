<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('users')->insert([
            'nom' => 'VEZILIER',
            'prenom' => 'Quentin',
            'email' => 'quentin.vezilier@imt-nord-europe.fr',
            'password' => bcrypt('quentin'),
            'permission' => 'admin'
        ]);
        DB::table('users')->insert([
            'nom' => 'FEI',
            'prenom' => 'Fan',
            'email' => 'fan.fei@imt-nord-europe.fr',
            'password' => bcrypt('feifan'),
            'permission' => 'admin'
        ]);
        DB::table('users')->insert([
            'nom' => 'GAO',
            'prenom' => 'Jiaqi',
            'email' => 'jiaqi.gao@imt-nord-europe.fr',
            'password' => bcrypt('gaojiaqi'),
            'permission' => 'admin'
        ]);
    }
}
