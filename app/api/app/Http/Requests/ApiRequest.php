<?php
namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiRequest extends Controller
{
   public function __construct(Request $request)
   {
      $this->validate($request, [
            'data' => ['required','min:3','not_regex:/[^+^*^\-^\-^\.^\/\d+]/u']
         ]
      );
      parent::__construct($request);
   }

}