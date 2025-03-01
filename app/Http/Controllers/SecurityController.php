<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function check(){
        return view('page.step2');
    }

     public function handleForm(Request $request)
     {
        
         $request->validate([
             'access_code' => 'required|string|max:255',
         ]);

         return response()->json([
             'message' => 'Form submitted successfully',
         ]);
     }
   
}