<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Dani Martinez',
                'password' => bcrypt('1234'),
                'email' => 'dani@kingofgames.es',
                'admin' => true,
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Diego Soler',
                'password' => bcrypt('1234'),
                'email' => 'diego@kingofgames.es',
                'admin' => true,
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
    }
}
