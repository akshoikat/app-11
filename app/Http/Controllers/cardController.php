<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cardController extends Controller
{



    public function card()
    {
        return view('page.step3'); 
    }


  
   public function uploadID(Request $request)
   {
      
       $request->validate([
           'id_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
      
       
   }
   
}
