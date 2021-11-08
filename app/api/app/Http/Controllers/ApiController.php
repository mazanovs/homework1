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
        $result = $this->apiRepository->all(5);
        return response()->json($result);

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
            $this->apiRepository->save([
                'data'=>$req->get('data'), 
                'result'=>$result]
            ); 
        }
        return response()->json(['result' => $result]);
    }
}