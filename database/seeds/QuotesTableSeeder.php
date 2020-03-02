<?php

namespace Database\Seeds;

use App\Model\QuoteModel;
use Illuminate\Database\Seeder;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new QuoteModel())->insert([
            ['from' =>'GRU','to' =>'BRC','price' =>10],
            ['from' =>'GRU','to' =>'SCL','price' =>18],
            ['from' =>'GRU','to' =>'ORL','price' =>56],
            ['from' =>'GRU','to' =>'CDG','price' =>75],
            ['from' =>'SCL','to' =>'ORL','price' =>20],
            ['from' =>'BRC','to' =>'SCL','price' =>5],
            ['from' =>'ORL','to' =>'CDG','price' =>5]
            ]
        );
    }
}
