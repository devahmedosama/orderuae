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



Route::get('ikea','Crowl\IkeaController@index');
Route::get('test','Crowl\AceController@fix_express');


Route::group(['middleware'=>'site_lang'],function(){

    Route::get('/','Site\HomeController@index');
    Route::get('/ar','Site\HomeController@index');
    Route::get('/en','Site\HomeController@index');
    
    //products
    Route::get('en/single/category/{slug}','Site\CategoryController@single');
    Route::get('ar/single/category/{slug}','Site\CategoryController@single');

    Route::get('en/single/product/{order_gno}/{slug}','Site\ProductController@single');
    Route::get('ar/single/product/{order_gno}/{slug}','Site\ProductController@single');

    Route::get('en/single/brand/{slug}','Site\ProductController@brand');
    Route::get('ar/single/brand/{slug}','Site\ProductController@brand');

    Route::get('en/all/products','Site\ProductController@index');
    Route::get('ar/all/products','Site\ProductController@index');


    Route::get('en/ajax/search','Site\CategoryController@ajax_search');
    Route::get('ar/ajax/search','Site\CategoryController@ajax_search');

    Route::get('en/suggestions','Site\ProductController@suggestions');
    Route::get('ar/suggestions','Site\ProductController@suggestions');

    // users

    Route::get('en/login','Site\UserController@login');
    Route::get('ar/login','Site\UserController@login');

    Route::post('en/login','Site\UserController@post_login');
    Route::post('ar/login','Site\UserController@post_login');

    Route::get('en/logout','Site\UserController@logout');
    Route::get('ar/logout','Site\UserController@logout');

    Route::get('en/myprofile','Site\UserController@my_profile');
    Route::get('ar/myprofile','Site\UserController@my_profile');

    Route::get('en/add/favourit','Site\FavouritController@add');
    Route::get('ar/add/favourit','Site\FavouritController@add');

    Route::post('en/myprofile','Site\UserController@post_profile');
    Route::post('ar/myprofile','Site\UserController@post_profile');

    Route::post('en/change/password','Site\UserController@change_password');
    Route::post('ar/change/password','Site\UserController@change_password');

    Route::get('en/my/orders','Site\OrderController@my_orders');
    Route::get('ar/my/orders','Site\OrderController@my_orders');

    Route::get('en/order/details/{id}','Site\OrderController@order_details');
    Route::get('ar/order/details/{id}','Site\OrderController@order_details');

    Route::get('en/cart','Site\OrderController@cart');
    Route::get('ar/cart','Site\OrderController@cart');

    Route::get('en/mycart','Site\OrderController@post_cart');
    Route::get('ar/mycart','Site\OrderController@post_cart');

    Route::get('check/cart','Site\OrderController@check_cart');

    Route::get('en/addresses','Site\AddressController@index');
    Route::get('ar/addresses','Site\AddressController@index');

    Route::get('en/edit/addresses/{id}','Site\AddressController@edit');
    Route::get('ar/edit/addresses/{id}','Site\AddressController@edit');

    Route::post('en/edit/addresses/{id}','Site\AddressController@post_edit');
    Route::post('ar/edit/addresses/{id}','Site\AddressController@post_edit');

    Route::get('en/add/addresses','Site\AddressController@index');
    Route::get('ar/add/addresses','Site\AddressController@index');

    Route::post('en/add/addresses','Site\AddressController@index');
    Route::post('ar/add/addresses','Site\AddressController@index');

    //refounds
    Route::get('en/refunds','Site\RefundController@index');
    Route::get('ar/refunds','Site\RefundController@index');


});

//Route::get('ar/sign-up','Site\UserController@sign_up');

Route::get('translate','Admin\ProductController@get_img');

// restaurant

Route::group(['middleware'=>'restaurant'],function(){

    Route::get('en/restaurant','Restaurant\HomeController@index');
    Route::get('ar/restaurant','Restaurant\HomeController@index');

    Route::get('en/single/restaurant/{slug}','Restaurant\HomeController@store');
    Route::get('ar/single/restaurant/{slug}','Restaurant\HomeController@store');

    Route::get('en/restaurant/category/{slug}','Restaurant\HomeController@category');
    Route::get('ar/restaurant/category/{slug}','Restaurant\HomeController@category');

    Route::get('en/single/meal/{id}/{slug}','Restaurant\HomeController@single_meal');
    Route::get('ar/single/meal/{id}/{slug}','Restaurant\HomeController@single_meal');

    Route::get('en/cart/restaurant','Restaurant\OrderController@cart');
    Route::get('ar/cart/restaurant','Restaurant\OrderController@cart');

    Route::get('en/restaurant/suggestions','Restaurant\HomeController@suggestions');
    Route::get('ar/restaurant/suggestions','Restaurant\OrderController@suggestions');

});



