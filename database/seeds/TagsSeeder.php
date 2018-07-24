<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(
            [
                'name' => 'KOG'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'King of Games'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'KOGT'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'King of Games Tournament'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'KOGTT'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'KOGA'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'King of Games Tag Team'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'King of Games Arcade'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'Steam Keys'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'Temporada 3'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'Claves de Steam'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'Temporada 2'
            ]
        );
        DB::table('tags')->insert(
            [
                'name' => 'Evento 2'
            ]
        );
    }
}
