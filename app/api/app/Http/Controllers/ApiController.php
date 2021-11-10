<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApiRepositoryInterface;
//use App\Models\Logs as LogsMDL;
use App\Http\Requests\ApiRequest;

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


    public function calcExpression(ApiRequest $req, $result = 'Expression error!')
    {
        
        try{
            $result = (new \ChrisKonnertz\StringCalc\StringCalc())->calculate($req->getParams()->data);    
        } catch (Throwable $e){
            $result = "Expression error!";
        } finally {
            if($result>0){
                $this->apiRepository->save(
                    [
                        'data'=>$req->getParams()->data, 
                        'result'=>$result
                    ]
                );
            }
        }
  
        return response()->json(['result' => $result]);
    }


}