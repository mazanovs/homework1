<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ApiRepositoryInterface;
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
    public function calcExpression(Request $request, StringCalc $strCalc, $result = "Expression error!")
    {   
        try{
            $result = $strCalc->calculate($request->get('data'));    
        } catch (Throwable $e){
            // Some debug work
        } finally {
            $this->apiRepository->save(
                [
                    'data'=>$request->get('data'), 
                    'result'=>$result
                ]
            );
            return response()->json(['result' => $result]);
        }
        
    }


}