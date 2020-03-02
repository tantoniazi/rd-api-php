<?php

use Illuminate\Database\Seeder;
use Database\Seeds\QuotesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([QuotesTableSeeder::class]);
    }
}
