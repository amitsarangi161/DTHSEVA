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
Route::post('/circles','ApiController@circles');
Route::middleware('APIToken')->group(function () {

    Route::post('/profile','ApiController@profile');
    Route::post('/update-profile','ApiController@updateProfile');
    Route::post('/change-password','ApiController@changePassword');
    Route::post('/logout','ApiController@postLogout');
    Route::post('/recharge-history','ApiController@rechargeHistory');
    Route::post('/create-mobile-recharge','ApiController@createMobileRecharge');
    Route::post('/create-dth-recharge','ApiController@createDthRecharge');
    Route::post('/create-wallet-recharge','ApiController@createWalletRecharge');

    Route::post('/mobile-recharge','ApiController@mobileRecharge');
    Route::post('/dth-recharge','ApiController@dthRecharge');
    Route::post('/wallet-recharge','ApiController@walletRecharge');

    
 

    Route::post('/wallet-history','ApiController@walletHistory');
    Route::post('/wallet-balance','ApiController@walletbalance');
    
  });
//Route::post('');


