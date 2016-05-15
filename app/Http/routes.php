<?php

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

    Route::get('/dashbord',[                            //Go to DashBord
        'uses'=>"StaffController@getDashbord",
        'as'=> "dashbord"
    ]);
    Route::get('/', function () {                       //Welcome Scree With Sign In 
        return view('staffsignin');
    });
    Route::post('/staffsigninaction',[                  //Sign IN Request
        'uses'=>'StaffController@postSignIn',
        'as'=>'staffsigninaction'
    ]);
//    Route::get('/signinform',function(){
//        return view('staffsignin');
//    }
//        
//    );
    Route::post('/signupstaff',[                        //Sign up Request
        'uses'=>'StaffController@postSignUp',
        'as'=> 'signupstaff'
    ]);
//    Route::get('/signup', function () {
//        return view('createstaffmember');
//    });
    Route::get('/signup',[                              //Get The Sign Up Form
        'uses'=>'StaffController@getSignUpForm',
        'as'=> 'signupForm'
    ]);
    Route::get('/signout', [
        'uses'=> 'StaffController@staffSignOut',
        'as'=>'signout'
    ]);


});
