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
//
// Route::get('/hello', function(){
//   echo "hello world";
// });


Route::group(['prefix' => 'auth'], function () {
    Route::post('signup', 'API\UserController@signup');
    Route::get('signup/activate/{token}', 'API\UserController@signupActivate');
      /****Super admin login ****/
      Route::post('login', 'API\UserController@login');
      /****school login ****/
      Route::post('/schoolLogin', 'API\SchoolController@login');
});



    Route::group([  'middleware' => 'auth:api'], function() {
        Route::get('logout', 'API\UserController@logout');
        Route::get('school', 'API\UserController@school');

        // access by only authenticated superadmin
        Route::group(['middleware' => 'superAdmin'], function(){
          /****Super admin create school*and school admin***/
          Route::post('createSchool', 'API\SchoolController@createSchool');
          Route::get('schoolAdmin', 'API\SchoolController@schoolAdmin');

        });

        // access by only authenticated admin
        Route::group(['middleware' => 'admin'], function(){
          /****School admin create student****/
          Route::post('createParent', 'API\ParentController@createParent');
          /****School admin create student****/
          Route::post('createStudent', 'API\StudentController@createStudent');
          /****School admin create Teacher****/
          Route::post('createTeacher', 'API\TeacherController@createTeacher');

          /****fetch card details of students****/
          Route::post('saveStudentLog', 'API\StudentController@saveStudentLog');

<<<<<<< HEAD
          /****save sent messages ****/
          Route::post('sentMessageLog', 'API\SentMessageController@sentMessageLog');

=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3

        });

    //     // access by only authenticated schools
    //     Route::group([ 'middleware' => 'school' ], function(){
    // });
  });
