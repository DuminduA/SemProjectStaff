<?php
use App\Staff;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>['web']],function(){

    Route::get('/dashbord',[
        'uses'=>"StaffController@getDashbord",
        'as'=> "dashbord"
    ]);
    Route::get('/staffsignin', function () {
        return view('staffsignin');
    });
    Route::post('/staffsigninaction',[
        'uses'=>'StaffController@postSignIn',
        'as'=>'staffsigninaction'
    ]);
    Route::post('/signupstaff',[
        'uses'=>'StaffController@postSignUp',
        'as'=> 'signupstaff'
    ]);
    Route::get('/signup', function () {
        return view('createstaffmember');
    });


});

Route::get('attendance','attendanceController@view');

Route::get('markAttendance',function(){
    $mStaff=Staff::all();
    return view('markAttendance',['mStaff'=>$mStaff]);
});

Route::post('markAttendance','markAttendanceController@post');



