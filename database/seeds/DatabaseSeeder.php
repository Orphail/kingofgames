<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(ParametersSeeder::class);
        $this->call(BlogCategoriesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(BlogsSeeder::class);
        $this->call(RanksSeeder::class);
        $this->call(ConsolesSeeder::class);
        $this->call(GenresSeeder::class);
    }
}
