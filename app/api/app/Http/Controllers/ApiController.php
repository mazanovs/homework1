<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApiRepositoryInterface;
use App\Models\Logs as LogsMDL;

class ApiController extends Controller
{

    private $apiRepository;

    public function __construct(ApiRepositoryInterface $apiRepository)
    {
        $this->apiRepository = $apiRepository;
    }

    /**
     * Get all latest calc expression
     *
     * @return json
     */
    public function calcAllLogs()
    {
        //return response()->json(LogsMDL::orderBy('id', 'desc')->limit(5)->get()->toArray());
        // Use Repository pattern
        return response()->json($this->apiRepository->all(5));
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
            // Use Repository pattern
            $params = new \stdClass();
            $params->expression = $req->get('data');
            $params->result = $result;
            $this->apiRepository->save($params);
            /*
            $n = new LogsMDL();
            $n->expression = $req->get('data');
            $n->result = $result;
            $n->save();
            */
        }
        return response()->json(['result' => $result]);
    }
}