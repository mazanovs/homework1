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
        $this->json('PUT', '/api/calc', ['data' => '1000+5'])->seeJson(['result' => 1005]);
        $this->json('PUT', '/api/calc', ['data' => '1000*5'])->seeJson(['result' => 5000,]);
        $this->json('PUT', '/api/calc', ['data' => '1000/5'])->seeJson(['result' => 200]);
        $this->json('PUT', '/api/calc', ['data' => '1000-5'])->seeJson(['result' => 995]);
        $this->json('PUT', '/api/calc', ['data' => '1000+5*5/5-5'])->seeJson(['result' => 1000]);    
        $this->json('PUT', '/api/calc', ['data' => '1000/0'])->seeJson(['result' => 'Expression error!']);
        $this->json('PUT', '/api/calc', ['data' => '1000/0.1'])->seeJson(['result' => 10000]); 
        $this->json('PUT', '/api/calc', ['data' => '100.90/2'])->seeJson(['result' => 50.45]); 
        $this->json('PUT', '/api/calc', ['data' => '1000.1/6.6'])->seeJson(['result' => 151.53030303030303]); 
        $this->json('PUT', '/api/calc', ['data' => '-507.23/2'])->seeJson(['result' => -253.615]);
        $this->json('PUT', '/api/calc', ['data' => '-5698.56/9'])->seeJson(['result' => -633.1733333333334]);
    }
}
