<?php

use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories')->insert(
            [
                'name' => 'AKOGP'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'Gamingmania'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOG'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOG Análisis'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOG Entrevistas'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOG Online'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOG Periódicos'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOGA'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOGT'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'KOGTT'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'Reportajes'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'Retrobarcelona'
            ]
        );
        DB::table('blog_categories')->insert(
            [
                'name' => 'Steam Keys'
            ]
        );
    }
}
