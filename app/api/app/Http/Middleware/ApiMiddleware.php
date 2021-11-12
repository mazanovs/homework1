<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    
        $validator = Validator::make($request->all(), [
            'data' => ['required','min:2','not_regex:/[^+^*^\-^\-^\.^\/\d+]/u']
        ]);

        if ($validator->fails()) {
            return ['result'=> $validator->errors()->first() ];
        }else{
            return $next($request);
        }
        
    }
}
