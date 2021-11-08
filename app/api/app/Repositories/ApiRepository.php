<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ApiRepositoryInterface;

use App\Models\Logs as LogsMDL;

class ApiRepository implements ApiRepositoryInterface
{
    public function all($count = 5)
    {
        return LogsMDL::orderBy('id', 'desc')->limit($count)->get()->toArray();
    }

    public function save($params)
    {
        $n = new LogsMDL();
        $n->expression = $params->expression;
        $n->result = $params->result;
        $n->save();
    }
}