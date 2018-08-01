<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                'nickname' => 'Orphail',
                'password' => bcrypt('1234'),
                'email' => 'dani@kingofgames.es',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('admins')->insert(
            [
                'nickname' => 'Go',
                'password' => bcrypt('1234'),
                'email' => 'diego@kingofgames.es',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
    }
}
