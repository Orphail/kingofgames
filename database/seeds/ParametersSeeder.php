<?php

use Illuminate\Database\Seeder;

class ParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameters')->insert(
            [
                'key' => 'item_page',
                'value' => 15,
                'created_at' => DB::Raw('NOW()'),
                'updated_at' => DB::Raw('NOW()')
            ]
        );
    }
}
