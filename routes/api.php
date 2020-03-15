<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/applications', 'ApplicationController@index')->middleware('auth:api');

// Route::post('/auth/login', 'AuthController@login')->middleware('auth:api');


Route::group([
    'prefix' => 'auth'
], function () {
    // Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::post('login', 'AuthController@login');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::group([    
    'middleware' => 'auth:api',    
    'prefix' => 'app'
], function () {    
    Route::get('bookmarks', 'BookmarkController@index');
    Route::post('bookmarks', 'BookmarkController@create');
    Route::put('bookmarks/{id}', 'BookmarkController@update');
    Route::patch('bookmarks/inc/{id}', 'BookmarkController@increment');
    Route::delete('bookmarks/{id}', 'BookmarkController@destroy');
});
