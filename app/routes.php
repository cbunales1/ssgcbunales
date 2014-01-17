<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before'=>'auth', 'prefix' => 'admin'), function() {
    
    Route::get('/', 'AdminController@dashboard');
    Route::resource('admins','AdminController');
    Route::resource('semesters', 'SemesterController');
    Route::resource('positions', 'PositionController');
    Route::resource('partylists', 'PartylistController');
    Route::resource('voters', 'VoterController');
    Route::resource('candidates', 'CandidateController');
    Route::resource('colleges', 'CollegeController');
    Route::resource('departments', 'DepartmentController');
    Route::get('returns', 'ReturnController@getIndex');
    Route::get('accounts','AccountController@getIndex');
    Route::get('search/voters', 'HomeController@getSearch');
    Route::get('wipedata','HomeController@getWipedata');
    Route::get('print/result','HomeController@getPrint');
});


Route::get('/', function(){
    return Redirect::to('login');
});


Route::group(array('before' => 'auth'), function() {
    Route::resource('castvotes', 'CastvoteController');
});

Route::get('/admin/login', 'HomeController@admingetLogin');
Route::post('/admin/login', 'HomeController@adminpostLogin');
Route::get('/admin/logout', 'HomeController@admingetLogout');


Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@getLogout');

Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('login')
        ->with('err', 'You must be logged in to view the page!');
});

Route::get('test','HomeController@getTest'); //deleteable   

Route::get('test1','FormController@sample'); //deletable