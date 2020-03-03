<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;


class RouteTest extends TestCase
{
    
    public function testCreate()
    {
        $response = $this->json('POST', '/route', ['from' => 'BRC' , 'to' => 'BA' , 'price' => 10]);
        $response->assertResponseOk();
    }
}
