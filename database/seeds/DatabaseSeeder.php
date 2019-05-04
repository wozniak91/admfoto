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
        
        $this->call(PagesTableSeeder::class);
        $this->call(NewsletterTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AttributesGroupsTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(CombinationsTableSeeder::class);
    }
}
