<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function return($result,$response,$message,$code){
        return Array(
            'result' => $result,
            'status' => Array(
                'response' => $response,
                'message' => $message,
                'code' => $code
            )
            
        );
    }
}
