<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class appController extends Controller
{

    
    public function login(Request $req)
    {


        $req->validate([
            'email' => 'required|email',
            'password' => 'required',            
        ]);
    }

    

 
}