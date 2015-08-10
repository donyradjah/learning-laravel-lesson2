<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('user')->insert([
            'id' => '',
            'name' => 'Samida',
            'phone' => '08813146431',
            'email' => 'samidamamatek@gmail.com',
            'address' => 'Tajinan',
            'level' => 'admin',
            'password' => bcrypt('secret'),
        ]);


    }
}
