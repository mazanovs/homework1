<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * A API JSON Return calculation 
     *
     * @return void
     */
    public function testReturnLogs()
    {

        $this->json('PUT', '/api/calc/logs', ['data' => '1000+5'])->seeJson([
           'result' => 1005,
        ]);

        $this->json('PUT', '/api/calc/logs', ['data' => '1000*5'])->seeJson([
            'result' => 5000,
        ]);
        
        $this->json('PUT', '/api/calc/logs', ['data' => '1000/5'])->seeJson([
            'result' => 200,
        ]);

        $this->json('PUT', '/api/calc/logs', ['data' => '1000-5'])->seeJson([
            'result' => 995,
        ]);
        
        $this->json('PUT', '/api/calc/logs', ['data' => '1000+5*5/5-5'])->seeJson([
            'result' => 1000,
        ]);    

    }
}
