<?php

Route::group(['middleware'=>['web']],function(){

    Route::get('/dashbord',[                            //Go to DashBord
        'uses'=>"StaffController@getDashbord",
        'as'=> "dashbord"
    ]);

    Route::get('/', function () {                       //Welcome screen And Home
        return view('staffsignin');
    })->name('home');
    
    Route::post('/staffsigninaction',[                  //Sign Request
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

    Route::post('/addNewItem',[
        'uses' => 'ItemController@addNewItem',
        'as' => 'addNewItem'
    ]);

    Route::get('/newItem',[                     //to show the newItem page
        'uses' => 'ItemController@getnewItem',
        'as' => 'newItem',
        'middleware'=>'auth'
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
});
