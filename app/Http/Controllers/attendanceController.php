<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class attendanceController extends Controller
{
    public function view(){
        return view('attendance');

    }
}
