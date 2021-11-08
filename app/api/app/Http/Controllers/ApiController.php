<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApiRepositoryInterface;
//use App\Models\Logs as LogsMDL;

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
        return response()->json($this->apiRepository->all(5));
    }

    /**
     * Work with expression, and calculate from the string
     *
     * @return json
    */
    public function calcExpression(Request $req, $result = null)
    {
        $validator = Validator::make($req->all(), [
            'data' => [
                'required',
                'min:3',
                'not_regex:/[^+^*^\-^\-^\.^\/\d+]/u'
            ]
        ]);

        if ($validator->fails()) { // Validate expression
            $result = "Expression error!";
        } else {
            try{
                $result = (new \ChrisKonnertz\StringCalc\StringCalc())->calculate($req->get('data'));    
            } catch (Throwable $e){
                $result = "Expression error!";
            } finally {
                if($result>0){
                    $this->apiRepository->save(
                        [
                            'data'=>$req->get('data'), 
                            'result'=>$result
                        ]
                    );
                }
            }
  
        }
        return response()->json(['result' => $result]);
    }
}