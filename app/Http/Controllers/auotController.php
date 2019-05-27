<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class auotController extends Controller
{
    


    public function Ount(Request $request){

       /*Elimanos las sessiones*/
        session()->flush();
        Cache::flush();
    	

    
    	return redirect()->route('Login.index');
    }
}
