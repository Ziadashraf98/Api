<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BaseController extends Controller
{
    public function sendResponse($data , $message)
    {
        $array = 
        [
            'data'=>$data,
            'message'=>$message,
        ];
        
        return response($array);
    }


    public function sendError($error)
    {
        $array = 
        [
            'message'=>$error,
        ];
        
        return response($array);

    }
}
