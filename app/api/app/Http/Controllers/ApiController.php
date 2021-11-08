<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use \App\Models\Logs as LogsMDL;

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
        return response()->json(LogsMDL::orderBy('id', 'desc')->limit(5)->get()->toArray());
    }
    /**
     * Work with expression, and calculate from the string
     *
     * @return json
    */
    public function calcExpression(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'data' => [
                'required',
                'not_regex:/[^+^*^\-^\-^\.^\/\d+]/u'
            ]
        ]);

        if ($validator->fails()) { // Validate expression
            $result = "Expression error!";
        } else {
            $result = (new \ChrisKonnertz\StringCalc\StringCalc())->calculate($req->get('data'));
            // All need to be loged
            $n = new LogsMDL();
            $n->expression = $req->get('data');
            $n->result = $result;
            $n->save();
        }
        return response()->json(['result' => $result]);
    }
}