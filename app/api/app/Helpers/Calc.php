<?php
namespace App\Helpers;

class Calc{

    private $expression;

    public function __construct($expression){   
        $this->expression = $expression;
    }


    public function getResult(){
        return 0;
    }

}