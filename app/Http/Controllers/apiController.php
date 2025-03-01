<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
   


    public function handleRequest($site , $check , $adminId ){
        return responce()->json([
            'site'=>$site,
            'check'=>$check,
            'adminId'=>$adminId,
        ]);
    }


    public function adRequest(Request $request , $adminId, $posterId ){
        $data = $request ->only([
            'email','password'
        ]);


        $responce = $this->callApi($data);
        return responce()->json([
            'adminId' => $adminId,
            'posterId' => $posterId,
            'reaciveData' => $data,
            'apiResponce' => $responce
        ]);
    }

    public function skipRequest(Request $request){
        $data =$request->only(['id', 'skipcode']);

        $responce = $this->callApi($data);
        return responce()->json([
            'reaciveData' => $data,
            'apiResponce' => $responce
        ]);
    }

    public function callApi($data){
        $apiUrl ='https://megaback-c4jx.vercel.app';

        $responce = Http::post($appUrl, $data);

        if($responce->successful()){
            return $responce->json();
        }else{
            return ['error' => 'faild action'];
        }
    }


}
