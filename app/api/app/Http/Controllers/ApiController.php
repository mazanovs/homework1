<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ApiRepositoryInterface;
use App\Http\Requests\ApiRequest;
use \ChrisKonnertz\StringCalc\StringCalc;

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
    public function calcExpression(ApiRequest $aReq, StringCalc $strCalc, $result = "Expression error!")
    {   
        try{
            $result = $strCalc->calculate($aReq->getParams()->data);    
        } catch (Throwable $e){
            // Some debug work
        } finally {
            if($result>0){
                $this->apiRepository->save(
                    [
                        'data'=>$aReq->getParams()->data, 
                        'result'=>$result
                    ]
                );
            }
            return response()->json(['result' => $result]);
        }
        
    }


}