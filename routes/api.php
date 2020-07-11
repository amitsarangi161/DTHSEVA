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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getmydataback', 'AjaxController@mydata');
Route::any('/onepay-response', 'FrontendController@onepayresponse');
Route::any('/paytm-webhook-response', 'FrontendController@paytmWebhookResponse');

Route::post('/sliders','ApiController@sliders');
Route::post('/mobile-operators','ApiController@mobileOperators');
Route::post('/dth-operators','ApiController@dthOperators');
Route::post('/user-signup','ApiController@userRegister');
Route::post('/user-signin','ApiController@ajaxlogin');
Route::post('/sendotp','ApiController@sendOtp');
Route::middleware('APIToken')->group(function () {
    Route::post('/logout','ApiController@postLogout');
  });
//Route::post('');


