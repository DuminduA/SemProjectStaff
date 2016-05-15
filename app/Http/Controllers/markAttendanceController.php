<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use App\Http\Requests\attendanceRequest;


class markAttendanceController extends Controller
{
    public function post(attendanceRequest $request){
        $post = $request->all();
        $current_date = date('Y-m-d');
        $data =array(
            'date' =>  $current_date,
            'staff_id' => $post['name'],
            'attendance' =>$post['attendance'],
            'arrival_time' =>$post['arrivalTime']
        );
        
        DB::table('attendances')->insert($data);
        return view('markAttendance');
    }
}
