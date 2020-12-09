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




Auth::routes();

Route::get('/test','testController@main');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/profile','ProfileController@index')->name("profile");
Route::get('/image','ImageController@showForm');
Route::post('/submit-image','ImageController@store');


Route::group(['middleware'=>['guest:shop']],function() {

    Route::get('/register_shop', "ShopRegisterController@main");
    Route::post('/register_shop', 'ShopRegisterController@registration');

    Route::get('/login_shop', 'ShopLoginController@main')->name('login_shop');
    Route::post('/login_shop', 'ShopLoginController@login');



});
Route::group(['middleware'=>['auth:shop']],function() {
    Route::get('logout_shop','ShopLoginController@shoplogout');
    Route::get('/addAd','AdsController@addPost');
});

Route::group(['middleware'=>['guest']],function()
{

    Route::get('/register', 'RegisterController@main');
    Route::post('/register', 'RegisterController@registration');

    Route::get('/login', 'LoginController@main')->name('login');
    Route::post('/login', 'LoginController@login');
});
Route::get('logout_user','LoginController@userlogout' );


Route::group(['middleware'=>['auth:admin']],function()
{

    Route::get('/admin','AdminController@main')->name('admin');
    Route::get('/admin/delete','AdminController@deleter');
    Route::post('/admin/{flag}','AdminController@adder');
});


Route::get('/shop={id}','ProfileController@shopOtherProfile');
Route::get('/myShop={id}_{flag}','ProfileController@shopMyProfile');
Route::get('/editMyProfile','ProfileController@edit');
Route::get('/deletePP','ProfileController@deletePP');//profile post
Route::get('/deletePFa','ProfileController@deletePFa');//profile favorite
Route::get('/deletePFo','ProfileController@deletePFo');//profile following
Route::Post('/changePP={id}','ProfileController@changePP');//profile photo
Route::get('/deletePPhoto','ProfileController@deletePPhoto');//profile photo
Route::get('/user={id}','ProfileController@userOtherProfile');
Route::get('/myUser={id}_{flag}','ProfileController@userMyProfile');
Route::get('/deleteUserPPhoto','ProfileController@deleteUserPPhoto');//user profile photo
Route::Post('/changeUserPP={id}','ProfileController@changeUserPP');//profile photo
Route::get('/editUserMyProfile','ProfileController@userEdit');
Route::Post('/changeUserPP={id}','ProfileController@changeUserPP');//profile photo
Route::get('/deleteUserPFo','ProfileController@deleteUserPFo');//profile following
Route::get('/deleteUserPFa','ProfileController@deleteUserPFa');//profile favorite



Route::get("/search","SearchController@search");


//for some odd reason the "/" doesnt show css and stuff
Route::group(['middleware'=>['guest:admin']],function() {
    Route::get('/register_admin', "AdminController@showRegisterForm");
    Route::post('/register_admin', 'AdminController@register');
    Route::get('/login_admin', 'AdminController@showLoginForm')->name('login_admin');
    Route::post('/login_admin', 'AdminController@login');
});

Route::get('/logout_admin','AdminController@logout');



Route::get("/ads={id}",'AdsController@showShop')->name('ad.id');

Route::get('/','IndexController@main')->name('home');
Route::post('/addAd','AdsController@handleAddPost');
Route::get('/about','AboutController@main');

Route::get('/contact','ContactController@main');
Route::Post('/contact','ContactController@store');

Route::get("/single={id}","AdsController@show");
Route::get('/followed_or_not','AdsController@is_followed');
Route::get('/favorite_or_not','AdsController@is_favorite');
Route::get('/follow','AdsController@follow');
Route::get('/unfollow','AdsController@unfollow');
Route::get('/favorite','AdsController@favorite');
Route::get('/unfavorite','AdsController@unfavorite');
Route::get('/edit','AdsController@edit');

Route::prefix('admin')->group(function(){

    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResettLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

Route::prefix('shop')->group(function(){
//some of the functions in the controller are inheretid from the reset passwords
    Route::post('/password/email','Auth\ShopForgotPasswordController@sendResetLinkEmail')->name('shop.password.email');
    Route::get('/password/reset','Auth\ShopForgotPasswordController@showLinkRequestForm')->name('shop.password.request');
    Route::post('/password/reset','Auth\ShopResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\ShopResetPasswordController@showResetForm')->name('shop.password.reset');

});


