<?php

use App\Staff;
use App\attendance;
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

    Route::get('/', function () {                       //Welcome screen And Home
        return view('staffsignin');
    })->name('home');
    
    Route::post('/staffsigninaction',[                  //Sign Request
        'uses'=>'StaffController@postSignIn',
        'as'=>'staffsigninaction'
    ]);

    Route::post('/signupstaff',[                        //Sign up Request
        'uses'=>'StaffController@postSignUp',
        'as'=> 'signupstaff'
    ]);

    Route::get('/signup',[                              //Get The Sign Up Form
        'uses'=>'StaffController@getSignUpForm',
        'as'=> 'signupForm'
    ]);
    Route::get('/signout', [
        'uses'=> 'StaffController@staffSignOut',
        'as'=>'signout'
    ]);

    Route::post('/passwordReset',
        ['uses'=>'StaffController@resetPassword',
            'as'=>'passwordReset'
            //  'middleware'=> 'auth'
        ]);
    Route::get('/password/reset', function () {                 //get the Password reset Form
        return view('passwordReset');
        //'middleware'=> 'auth'
    });

    Route::post('/addNewItem',[
        'uses' => 'ItemController@addNewItem',
        'as' => 'addNewItem',
        'middleware'=>'auth'
    ]);

    Route::get('/newItem',[                     //to show the newItem page
        'uses' => 'ItemController@getnewItem',
        'as' => 'newItem',
        //'middleware'=>'auth'
    ]);

    Route::get('/updateItems',[                   //to show the Item table page
        'uses' => 'ItemController@getUpdateItems',
        'as' => 'updateItems'
    ]);


    Route::get('/item-delete/{itemID}',[        //to delete a item
        'uses' => 'ItemController@deleteItem',
        'as' => 'item.delete'
    ]);

    Route::get('/item-edit/{itemID}',[          //to edit a item
        'uses' => 'ItemController@editItem',
        'as' => 'item.edit'
    ]);

    Route::post('/addEditItem/{item}',[            //to add the edited item to the table
        'uses' => 'ItemController@addEditItem',
        'as' => 'addEditItem'
    ]);

    Route::get('/orders/new',[                      //get the new form with data
        'uses'=>'OrderController@showNewOrders',
        'as'=>'newOrders']);
    
    Route::post('/search',[                              //Search Results
        'uses' => 'ItemController@search',
        'as' => 'search'
    ]);

    Route::get('/displayRequest',[
        'uses'=>'CustomerRequestController@displayRequest',
        'as'=>'displayRequest',
        //'middleware' => 'auth'
    ]);

    Route::post('/requestsearch',[
        'uses'=>'CustomerRequestController@requestsearch',
        'as'=>'requestsearch',
        //'middleware' => 'auth'
    ]);

    Route::get('/complete/{ID}',[
        'uses'=>'CustomerRequestController@complete',
        'as'=>'complete'
    ]);
    
    Route::get('/reject/{ID}',[
        'uses'=>'CustomerRequestController@reject',
        'as'=>'reject'
    ]);
    
    Route::get('/oldRequest',[
        'uses'=>'CustomerRequestController@oldRequest',
        'as'=>'oldRequest'
    ]);


    Route::get('attendance','attendanceController@view');
    
    Route::get('/markAttendance',function(){
        $mStaff=Staff::all();
        return view('markAttendance',['m_Staff'=>$mStaff]);
    });
    
    Route::post('markAttendance',
        ['uses'=>'markAttendanceController@post',
        'as'=>'markAttendance'
    ]);
    
    Route::get('attendance/{att}',
         ['uses'=>'attendanceController@delete',
          'as'=>'attendance'
         ]);

    Route::get('/attendancetable',
        ['uses'=>'attendanceController@view',
            'as'=>'attendancetable'
        ]);

    Route::get('/orderTable',[
       'uses'=>'OrderController@getOrders',
        'as'=>'orderTable'
    ]);
    
    Route::get('/newTable',[
        'uses'=>'OrderController@newOrders',
        'as'=>'newTable'
    ]);
    
    Route::get('/proceedOrders',[
        'uses'=>'OrderController@proceedOrders',
        'as'=>'proceedOrders'
    ]);
    
    Route::get('/cancelOrders',[
        'uses'=>'OrderController@cancelOrders',
        'as'=>'cancelOrders'
    ]);
    
    Route::get('/FinishOrders',[
        'uses'=>'OrderController@FinishOrders',
        'as'=>'FinishOrders'
    ]);
    
    Route::get('/returnOrders',[
        'uses'=>'OrderController@returnOrders',
        'as'=>'returnOrders'
    ]);
    
    Route::get('/returnAccept/{id}',[
        'uses'=>'OrderController@returnAccept',
        'as'=> 'returnAccept'
    ]);
    
    Route::get('/returnReject/{id}',[
        'uses'=>'OrderController@returnReject',
        'as'=> 'returnReject'
    ]);
    
    Route::get('/proceedCancel/{id}',[
        'uses'=>'OrderController@proceedCancel',
        'as'=> 'proceedCancel'
    ]);

    Route::get('/proceedFinish/{id}',[
        'uses'=>'OrderController@proceedFinish',
        'as'=> 'proceedFinish'
    ]);
    
    Route::get('/newAccept/{id}',[
        'uses'=>'OrderController@newAccept',
        'as'=> 'newAccept'
    ]);
    
    Route::get('/newReject/{id}',[
        'uses'=>'OrderController@newReject',
        'as'=> 'newReject'
    ]);
    
    Route::get('/orderDetail/{id}',[
        'uses'=>'OrderController@orderDetail',
        'as'=> 'orderDetail'
    ]);
    
});




