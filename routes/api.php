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
      /****user login ****/
      Route::post('login', 'API\UserController@login');
      /****school login ****/
      Route::post('/schoolLogin', 'API\SchoolController@login');
      // getAllSchoolName
      Route::post('/getAllSchoolName', 'API\SchoolController@getAllSchoolName');
});



    Route::group([  'middleware' => 'auth:api'], function() {
        Route::get('logout', 'API\UserController@logout');
        Route::get('school', 'API\UserController@school');
        Route::get('fetchChildren/{name}/{class_assigned}', 'API\UserController@fetchChildren');
        Route::post('updateProfile', 'API\UserController@UpdateProfile');
        Route::post('updateProfileImage', 'API\UserController@UpdateProfileImage');
      // login Account
      Route::post('/loginAccount', 'API\UserController@loginAccount');
      Route::post('sendNotif', 'API\NotifController@sendNotif');
      Route::get('recieveNotif/{reciever_acct_type}/{reciever_id}/{school_id}', 'API\NotifController@recieveNotif');
      Route::get('readNotif/{notif_id}', 'API\NotifController@readNotif');
      Route::get('sentNotif/{sender_acct_type}/{sender_id}/{school_id}', 'API\NotifController@sentNotif');

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

          Route::post('sentMessageLog', 'API\SentMessageController@sentMessageLog');

          Route::post('checkAuth', 'API\SchoolController@checkAuth');
          
        //   add new account for existing user
          Route::post('addAccount', 'API\UserController@addAccount');

        });

    //     // access by only authenticated schools
    //     Route::group([ 'middleware' => 'school' ], function(){
    // });
  });
