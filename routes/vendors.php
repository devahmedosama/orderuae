<?php 


Route::get('/','Vendors\UserController@login');

Route::get('login','Vendors\UserController@login')->name('login');
Route::post('login','Vendors\UserController@postLogin');

Route::group(['middleware'=>'auth:vendor','prefix'=>'dashboard'],function(){

    Route::get('/','Vendors\HomeController@index');
    Route::get('logout','Vendors\HomeController@logout');
	Route::get('account','Vendors\HomeController@account');

	Route::get('stores/{id}','Vendors\ProductController@index');

	//products
    Route::get('products/{id}','Vendors\ProductController@index');
    Route::get('products/add/{id}','Vendors\ProductController@add');
    Route::post('products/add/{id}','Vendors\ProductController@postAdd');
    Route::get('products/edit/{id}','Vendors\ProductController@edit');
    Route::get('products/delete/{id}','Vendors\ProductController@delete');
    Route::post('products/edit/{id}','Vendors\ProductController@postEdit');
    Route::get('products/import/{id}','Vendors\ProductController@import');
    Route::post('products/import/{id}','Vendors\ProductController@postImport');


    //restaurant/menu
    Route::get('restaurant/menu/{id}','Vendors\StoreMenuController@index');
    Route::get('restaurant/menu/add/{id}','Vendors\StoreMenuController@add');
    Route::post('restaurant/menu/add/{id}','Vendors\StoreMenuController@postAdd');
    Route::get('restaurant/menu/edit/{id}','Vendors\StoreMenuController@edit');
    Route::get('restaurant/menu/delete/{id}','Vendors\StoreMenuController@delete');
    Route::post('restaurant/menu/edit/{id}','Vendors\StoreMenuController@postEdit');


    // restaurant items 
    Route::get('restaurant/items/add/{id}','Vendors\ItemController@add');
    Route::post('restaurant/items/add/{id}','Vendors\ItemController@postAdd');
    Route::get('restaurant/items/edit/{id}','Vendors\ItemController@edit');
    Route::post('restaurant/items/edit/{id}','Vendors\ItemController@postEdit');



    //offers
    Route::post('add/offer/{id}','Vendors\OfferController@add');
    Route::get('produt/offers/{id}','Vendors\OfferController@product_offers');
    Route::get('offers/delete/{id}','Vendors\OfferController@delete');
    Route::post('product/offer/{id}','Vendors\OfferController@add_product');
    Route::post('edit/product/offer/{id}','Vendors\OfferController@edit_product');
    Route::get('store/offers/{id}','Vendors\OfferController@store');


    //statistics
    Route::get('statistics','Vendors\StatisticController@index');
    Route::get('statistics/store/{id}','Vendors\StatisticController@store');
    
    // ware houses
    Route::get('warehouses','Vendors\WareHouseController@index');
    Route::get('warehouses/add','Vendors\WareHouseController@add');
    Route::post('warehouses/add','Vendors\WareHouseController@postAdd');
    Route::get('warehouses/edit/{id}','Vendors\WareHouseController@edit');
    Route::post('warehouses/edit/{id}','Vendors\WareHouseController@postEdit');
    Route::get('warehouses/delete/{id}','Vendors\WareHouseController@delete');

    // help center 
    Route::get('helpcenter','Vendors\HelpCenterController@index');
    Route::get('helpcenter/single/{id}','Vendors\HelpCenterController@single');




});


