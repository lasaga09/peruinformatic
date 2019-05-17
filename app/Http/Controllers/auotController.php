<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class auotController extends Controller
{
    


    public function Ount(Request $request){

       /*Elimanos las sessiones*/
        session()->flush();
    	

    
    	return redirect()->route('index');
    }
}
