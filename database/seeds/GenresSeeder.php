<?php

use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(
            [
                'name' => 'Lucha',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Carreras',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Deportes',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Minijuegos',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Puzzles',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Shoot \'em up',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Beat \'em up',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('genres')->insert(
            [
                'name' => 'Rail shooter',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
    }
}
