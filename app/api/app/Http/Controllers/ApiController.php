<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get all latest calc expression
     *
     * @return json
     */
    public function calcAllLogs()
    {
        return response()->json(\App\Models\Logs::orderBy('id', 'desc')->limit(5)->get()->toArray());
    }

    /**
     * Work with expression, and calculate from the string
     *
     * @return json
    */
    public function calcExpression(Request $req)
    {
        $result = (new \ChrisKonnertz\StringCalc\StringCalc())
            ->calculate($req->get('data'));

        // All need to be loged
        $n = new \App\Models\Logs();
        $n->expression = $req->get('data');
        $n->result = $result;
        $n->save();

        return response()->json(['result' => $result]);
    }
}