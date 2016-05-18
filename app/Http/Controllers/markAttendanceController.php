<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use App\attendance;
use App\Http\Requests;


class markAttendanceController extends Controller
{
    public function post(Request $request){
        $post = $request->all();

        $current_date = date('Y-m-d');
        
        $data =array(
            'date' =>  $current_date,
            'staff_id' => $post['sid'],
            'attendance' =>$post['attendance'],
            'arrival_time' =>$post['arrivalTime'],
        );


        $m_Staff=Staff::all();
        $m1="You can't enter a arrival time for a absent person!";
        $m2="Please enter the arrival time of the relevant person!";
        $m3="You already marked this person's attendance!";


        if(attendance::where('staff_id', '=', $post['sid'])->where('date',$current_date)->first() != null){
            echo $m3;
            return view('markAttendance')->with('m_Staff', $m_Staff);
        }

        if($post['attendance'] == 2 && $post['arrivalTime'] != null){
            echo $m1;
            return view('markAttendance')->with('m_Staff', $m_Staff);
        }

        elseif($post['attendance'] == 1 && $post['arrivalTime'] == null){
            echo $m2;
            return view('markAttendance')->with('m_Staff', $m_Staff);
        }

        else {
            echo "";
            DB::table('attendances')->insert($data);            //saving the attendance date in database
            return view('markAttendance')->with('m_Staff', $m_Staff);        //return to markAttendance page
        }
    }




}
