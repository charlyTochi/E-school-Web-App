<?php

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
// Route::get('/', function () {
//     return view('welcome');
// });
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('get-post-chart-data', 'ChartDataController@getMonthlyPostData');


Auth::routes();

Route::get('activate', 'UserController@activate')->name('activate');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/studentView/{id}', 'HomeController@studentView')->name('studentView')->middleware('auth');
// Route::post('loginUser', 'LoginController@loginUser');
Route::get('user/chart','HomeController@chart');
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::Post('adminLogin', 'API\UserController@login');
// Route::get('/schools', 'HomeController@index')->name('schools')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
  Route::group(['middleware' => 'superadmin'], function(){
    Route::resource('user', 'UserController', ['except' => ['show']]);
  });

  // Route::group(['middleware' => 'admin'], function(){
    Route::resource('parents', 'ParentsController', ['except' => ['show']]);
    Route::resource('student', 'StudentController', ['except' => ['show']]);
    Route::resource('teacher', 'TeacherController', ['except' => ['show']]);
    Route::resource('message', 'MessageController', ['except' => ['show']]);
	Route::resource('classes', 'ClassController', ['except' => ['show']]);
	Route::get('details/{id}', 'StudentController@details')->name('details');
	Route::get('add', 'ParentsController@add')->name('add');
	Route::get('addTeacher', 'TeacherController@addTeacher')->name('addTeacher');
	Route::post('addAccount', 'AccountController@addAccount')->name('addAccount');
  // });
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
