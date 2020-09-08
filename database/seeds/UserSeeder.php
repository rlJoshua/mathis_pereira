<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mathis Pereira',
            'email' => 'mathis.pereira2@orange.fr',
            'password' => Hash::make('pirator93')
        ]);
    }
}
