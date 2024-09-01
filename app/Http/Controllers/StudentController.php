<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{
    public function dashboard(Request $request){
        try{
            $user = $user = Auth::user();
            return view('dashboard')->with('user',$user);
        }catch(Exception $e){

        }
    }
}
