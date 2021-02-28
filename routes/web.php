<?php

//added by me just to rideout of the errors without knowing them
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){

    Route::get('/home',[
        'uses'=> 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/posts/create',[
        'uses'=> 'PostsController@create',
        'as'=> 'post.create'
    ]);
    
    Route::get('/posts/store',[
        'uses'=> 'PostsController@store',
        'as'=> 'post.store'
    ]);
    
    Route::get('/posts',[
        'uses'=>'PostsController@index',
        'as'=>'posts'
    ]);

    Route::get('/posts/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);

    Route::get('catagory/create',[
        'uses' => 'CatagoriesController@create',
        'as' => 'catagory.create'
    ]);
    Route::post('catagory/store',[
        'uses' => 'CatagoriesController@store',
        'as' => 'catagory.store'
    ]);

    Route::post('/catagories',[
        'uses' => 'CatagoriesController@index',
        'as' => 'catagories'
    ]);
});