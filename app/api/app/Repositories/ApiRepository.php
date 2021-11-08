<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ApiRepositoryInterface;
//use App\Models\Logs as LogsMDL;
//use Illuminate\Support\Facades\DB;

class ApiRepository implements ApiRepositoryInterface
{
 
    public function all($count = 5)
    {
        //return DB::select('SELECT * FROM logs ORDER BY id DESC LIMIT 5');  
        return app('db')->select('SELECT * FROM logs ORDER BY id DESC LIMIT 5');
        //return LogsMDL::orderBy('id', 'desc')->limit($count)->get()->toArray();
    }

    public function save($p)
    {
        app('db')->insert('INSERT INTO logs (expression,result) values (?, ?)',
            [
                $p['data'],
                $p['result']
            ]
        );
    /*
        $n = new LogsMDL();
        $n->expression = $p['data'];
        $n->result = $p['result'];
        $n->save();
    */

    }
}