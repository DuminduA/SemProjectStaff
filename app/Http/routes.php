<?php

Route::group(['middleware'=>['web']],function(){

    Route::get('/dashbord',[
        'uses'=>"StaffController@getDashbord",
        'as'=> "dashbord"
    ]);
    Route::get('/', function () {
        return view('staffsignin');
    })->name('home');
    
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

    Route::post('/addNewItem',[
        'uses' => 'ItemController@addNewItem',
        'as' => 'addNewItem'
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
});
