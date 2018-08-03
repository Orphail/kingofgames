<?php

use Illuminate\Database\Seeder;

class ConsolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consoles')->insert(
            [
                'name' => 'Dreamcast',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Gamecube',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Master System',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Mega Drive',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'NeoGeo CD',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Nintendo 64',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Playstation 4',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'PS2',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'PS3',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'PS4',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'PSX',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Saturn',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'SNES',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Switch',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Wii',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Wii U',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Xbox',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Xbox 360',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'Xbox One',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
        DB::table('consoles')->insert(
            [
                'name' => 'NES',
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
    }
}