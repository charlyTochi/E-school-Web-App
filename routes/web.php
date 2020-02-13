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

<<<<<<< HEAD
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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/studentView/{id}', 'HomeController@studentView')->name('studentView')->middleware('auth');
// Route::post('loginUser', 'LoginController@loginUser');
=======
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::Post('adminLogin', 'API\UserController@login');
// Route::get('/schools', 'HomeController@index')->name('schools')->middleware('auth');
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3

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
<<<<<<< HEAD
  Route::group(['middleware' => 'superadmin'], function(){
    Route::resource('user', 'UserController', ['except' => ['show']]);
  });

  // Route::group(['middleware' => 'admin'], function(){
    Route::resource('parents', 'ParentsController', ['except' => ['show']]);
    Route::resource('student', 'StudentController', ['except' => ['show']]);
    Route::resource('teacher', 'TeacherController', ['except' => ['show']]);
    Route::resource('message', 'MessageController', ['except' => ['show']]);
  // });
=======
	Route::resource('user', 'UserController', ['except' => ['show']]);
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
