<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\attendance;
use App\Http\Requests;

class attendanceController extends Controller
{
    public function view(){

        $sheet=attendance::all();
        
        return view ('attendance',['data' => $sheet]);
    }

}
