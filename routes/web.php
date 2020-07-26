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

Route::get('/', 'FrontendController@home');
Route::post('/addsubscriber','FrontendController@addsubscriber');
Route::post('/getOnepayBalance','FrontendController@getOnepayBalance');
Route::get('/userlogin','FrontendController@userlogin');
Route::get('/guestchkout','FrontendController@guestchkout');
Route::get('/recharge/mobilerecharge','FrontendController@mobilerecharge');
Route::get('/customerregister','FrontendController@customerregister');
Route::post('/userRegister','FrontendController@userRegister');
Route::get('/products/{pname}/{id}','FrontendController@productdetails');
Route::get('/packages/{bname}/{bid}','FrontendController@viewpackagesbybrand');
Route::get('/productsbycategory/{bname}/{bid}','FrontendController@viewproductsbybrand');
Route::get('/channels/{bname}/{bid}','FrontendController@channels');
Route::get('/buynow/{pid}','FrontendController@orderopen');
Route::post('sendOtp','AjaxController@sendOtp');
Route::post('/userlogin','FrontendController@loginuser');
Route::get('/userLogout','FrontendController@userLogout');
Route::post('/placeOrder/{pid}','FrontendController@placeOrder');
Route::post('/searchProduct','AjaxController@searchProduct');
Route::get('/search/{pname}/{pid}','FrontendController@searchresult');
Route::get('/viewpackagedetails/{pname}/{pid}','FrontendController@viewpackagedetails');
Route::get('/allchannelinfo','FrontendController@allchannelinfo');
Route::get('/recharge/recharge','FrontendController@recharge');


Route::get('/myaccount','FrontendController@myaccount');
Route::get('/myaccount/myproductorders','FrontendController@myproductorders');
Route::get('/myaccount/mymobilerecharges','FrontendController@mymobilerecharges');
Route::get('/myaccount/mydthrecharges','FrontendController@mydthrecharges');
Route::get('/myaccount/myprofile','FrontendController@myprofile');
Route::get('/myaccount/mywallet','FrontendController@mywallet');

Route::get('/myaccount1','FrontendController@myaccount');
Route::post('/cancelOrder','FrontendController@cancelOrder');
Route::post('/addReview','FrontendController@addReview');
Route::post('/updateprofile/{id}','FrontendController@updateprofile');
Route::post('/rechargeOrder','FrontendController@rechargeOrder');
Route::get('/rechargeorderform','FrontendController@rechargeorderform');
Route::post('/ajaxlogin','AjaxController@ajaxlogin');
Route::post('/verifyOtp','AjaxController@verifyOtp');
Route::post('/changepassword','AjaxController@changepasswordCust');
Route::post('/checkcouponcode','AjaxController@checkcouponcode');
Route::post('/dorechargenow','FrontendController@rechargeorder');
Route::get('/paymentgateway/{oid}','FrontendController@pgrouting');
Route::get('/refundpolicy','FrontendController@refund');
Route::get('/privacy','FrontendController@privacy');
Route::get('/tnc','FrontendController@tnc');
Route::get('/aboutus','FrontendController@aboutus');
Route::get('/dorechargenow/{oid}','FrontendController@pgroutingrecharge');
Route::get('/domobilerechargenow/{oid}','FrontendController@pgroutingmobilerecharge');
Route::get('/dowalletrechargenow/{oid}','FrontendController@pgroutingwalletrecharge');

Route::get('/responsedata','FrontendController@responsedata');

Route::get('/rechargeresponsedata','FrontendController@rechargeresponsedata');
Route::any('/onepay-response', 'FrontendController@onepayresponse');
Route::post('/placerechargeorder','AjaxController@placerechargeorder');
Route::post('/placemobilerechargeorder','AjaxController@placemobilerechargeorder');



Route::post('/changePassword','AjaxController@changePassword');
Route::post('/rechargecontactus','FrontendController@rechargecontactus');

Route::get('/payment','PaytmController@pay');
Route::post('/payment/status', 'PaytmController@paymentCallback');
Route::post('/payment/reponsestatus', 'FrontendController@paymentCallback');
Route::post('/payment/mobile-reponsestatus', 'FrontendController@paymentCallbackMobile');
Route::post('/payment/wallet-reponsestatus', 'FrontendController@paymentCallbackWallet');

Route::post('/rechargewallet', 'FrontendController@rechargewallet');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/msetup/mobileoperators','MobileRechargeController@mobileoperators');
Route::get('/editoperators/{id}','MobileRechargeController@editoperators');
Route::post('/saveoperators','MobileRechargeController@saveoperators');
Route::post('/updateoperator/{id}','MobileRechargeController@updateoperator');
Route::get('/viewdthrecharge/{id}','OrderController@viewdthrecharge');
Route::get('/viewwallettopup/{id}','OrderController@viewwallettopup');

Route::get('/viewmobilerecharge/{id}','OrderController@viewmobilerecharge');



Route::resource('/msetup/brands','BrandController');
Route::resource('/msetup/category','CategoryController');

Route::resource('/psetup/coupon','CouponController');

Route::resource('/msetup/channels','ChannelController');

Route::get('/psetup/package','PackageController@packagecreate');
Route::post('/loadChannel','AjaxController@loadChannel');
Route::post('/savepackage','PackageController@savepackage');
Route::get('/psetup/viewallPackages','PackageController@viewallPackages');
Route::delete('/deletepackage/{id}','PackageController@deletepackage');
Route::get('/editpackage/{id}/edit','PackageController@editpackage');
Route::post('/updatepackage/{id}','PackageController@updatepackage');


Route::post('/companypolicyupdate/','HomeController@companypolicyupdate');
Route::resource('/psetup/product','ProductController');
Route::get('/psetup/viewallproduct','ProductController@viewallproduct');
Route::resource('/cms/sliders','SliderController');
Route::get('/cms/allsliders','SliderController@allsliders');
Route::resource('/psetup/salechannels','SaleschannelController');
Route::get('/psetup/viewallsalechannels','SaleschannelController@viewallsalechannels');
Route::get('/orders/productorders','OrderController@productorders');
Route::get('/orders/orderdetails/{oid}','OrderController@orderdetails');


Route::get('/recharge/rechargeorders','OrderController@rechargeorders');
Route::get('/recharge/wallettop-up','OrderController@walletTopup');
Route::get('/recharge/mobilerechargeorders','OrderController@mobilerechargeorders');

Route::get('/cms/companypolicies','HomeController@companypolicy');
Route::post('/changeRechargeOrderstatus','OrderController@changeRechargeOrderstatus');
Route::post('/backendupdatestatus','OrderController@backendupdatestatus');

Route::get('/customers/viewallcustomer','HomeController@viewallcustomer');
Route::post('/sendmsg','HomeController@sendmsg');

Route::get('/cms/offerimage','HomeController@offerimage');
Route::post('/offerimage','HomeController@saveofferimage');

Route::get('/cms/add-banners','BannersController@index');
Route::post('/ajaxAddbanner','AjaxController@addBanners');


Route::get('/customers/addcustomer','HomeController@addcustomer');
Route::post('/savecustomer','HomeController@savecustomer');
Route::post('/updatecustomer','HomeController@updatecustomer');

Route::get('/reports/paymentreport','HomeController@paymentreport');
Route::get('/reports/onepayreport','HomeController@onepayreport');
Route::get('/reports/walletreport','HomeController@walletreport');
Route::get('/tickets/rechargetickets','HomeController@rechargetickets');

Route::get('/msetup/managesubadmin','HomeController@managesubadmin');
Route::post('/saveuser','HomeController@saveuser');
Route::post('/updateuser','HomeController@updateuser');


});