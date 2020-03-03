<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class QuoteTest extends TestCase
{
   
    public function testGRUSCL()
    {
        $json = $this->get("/quote/GRU/SCL/")->response->getContent();
        $this->assertEquals('{"route":"GRU,BRC,SCL","price":15}' , $json);
    }

    public function testGRUBRC()
    {
        $json = $this->get("/quote/GRU/BRC/")->response->getContent();
        $this->assertEquals('{"route":"GRU,BRC","price":10}' , $json);
    }
}
