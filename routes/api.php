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

Route::group(['middleware'=>'set_lang'],function(){

    /* users */
    Route::post('login','Api\UserController@login');
    Route::post('register','Api\UserController@register');
    Route::post('activate/account','Api\UserController@activate');
    Route::post('forget/password','Api\UserController@forget_password');
    Route::post('activate/password','Api\UserController@activate_password');
    Route::post('socail/login','Api\UserController@social_login');
    
    /* general */
    Route::post('countries','Api\CountryController@index');
    Route::post('country/cities/{id}','Api\CityController@index');
    Route::post('pages','Api\PageController@index');
    Route::post('brands/{id}','Api\BrandController@index');


    /* departments */
    Route::post('departments','Api\DepartmentController@index');
    Route::post('department/categories/{id}','Api\CategoryController@dep_categories');
    Route::post('category/children/{id}','Api\CategoryController@children');
    Route::post('category/products/{id}','Api\ProductController@category');
    Route::post('department/products/{id}','Api\ProductController@department');
    Route::post('department/toprank/{id}','Api\ProductController@top_rank');
    Route::post('products/offers','Api\ProductController@offers');


    /* stores */
    Route::post('stores/{id}','Api\StoreController@category');
    Route::post('offer/stores','Api\StoreController@offer');
    Route::post('department/stores/{id}','Api\StoreController@department_stores');
    Route::post('restaurant/{id}','Api\StoreController@restaurant');

    /*products */
    Route::post('single/item/{id}','Api\ProductController@item');
    Route::post('search/product','Api\ProductController@index');

    /* paymentways*/
    Route::post('paymentways','Api\PaymentWayController@index');

    /* deliverytypes*/
    Route::post('deliverytypes','Api\DeliveryTypeController@index');

    /* ads */ 
    Route::post('department/ads/{id}','Api\AdsController@department');
    Route::post('category/ads/{id}','Api\AdsController@category');

    /* settings */
    Route::post('settings','Api\SettingController@index');

    /* filters */
    Route::post('filter/category/{id}','Api\CategoryFilterController@index');

    /* contact */
    Route::post('contact','Api\ContactController@add');

    /* vendor */
    Route::post('vendor/login','Api\VendorController@login');
    
});

Route::get('login','Api\UserController@must_login')->name('login');

Route::group(['middleware'=>['auth:api','set_lang','active']],function(){

    
    Route::post('profile','Api\UserController@profile');
    Route::post('update/profile','Api\UserController@update_profile');
    Route::post('update/location','Api\UserController@update_location');
    Route::post('reset/password','Api\UserController@reset_password');
    Route::post('change/password','Api\UserController@change_password');
    Route::post('logout','Api\UserController@logout');
    Route::post('my/wallet','Api\UserController@wallet');


    /* vendor */
    Route::post('my/store','Api\VendorController@my_store');
    Route::post('edit/store','Api\VendorController@edit_store');
    Route::post('my/menu','Api\VendorController@my_menu');
    Route::post('add/menu','Api\VendorController@add_menu');
    Route::post('edit/menu/{id}','Api\VendorController@edit_menu');
    Route::post('delete/menu/{id}','Api\VendorController@delte_menu');

    /* vendor products */
    Route::post('my/products','Api\VendorProductController@my');
    Route::post('vendor/single/product/{id}','Api\VendorProductController@single_product');
    Route::post('add/product','Api\VendorProductController@add');
    Route::post('edit/product/{id}','Api\VendorProductController@edit');
    Route::post('delete/product/{id}','Api\VendorProductController@delete');

    /*sizes  */
    Route::post('edit/size/{id}','Api\VendorProductController@edit_size');
    Route::post('add/size/{id}','Api\VendorProductController@add_size');
    Route::post('delete/size/{id}','Api\VendorProductController@delete_size');


    /*upons  */
    Route::post('edit/upon/{id}','Api\VendorProductController@edit_upon');
    Route::post('add/upon/{id}','Api\VendorProductController@add_upon');
    Route::post('delete/upon/{id}','Api\VendorProductController@delete_upon');


    /*options  */
    Route::post('edit/option/{id}','Api\VendorProductController@edit_option');
    Route::post('add/option/{id}','Api\VendorProductController@add_option');
    Route::post('delete/option/{id}','Api\VendorProductController@delete_option');

    Route::post('edit/option-item/{id}','Api\VendorProductController@edit_option_item');
    Route::post('add/option-item/{id}','Api\VendorProductController@add_option_item');
    Route::post('delete/option-item/{id}','Api\VendorProductController@delete_option_item');

    /*vendor orders*/
    Route::post('vendor/orders','Api\VendorOrderController@index');
    Route::post('vendor/single/order/{id}','Api\VendorOrderController@single');
    Route::post('vendor/update/order/{id}','Api\VendorOrderController@update');


    /*vendor offers*/
    Route::post('vendor/add/offer','Api\VendorOfferController@post_add');
    Route::post('vendor/edit/offer/{id}','Api\VendorOfferController@post_edit');
    Route::post('vendor/delete/offer','Api\VendorOfferController@delete');
    Route::post('vendor/my/offer','Api\VendorOfferController@my');


});    
Route::group(['middleware'=>['auth:api','set_lang','active']],function(){

    
        /* cart  */
        Route::post('add/cart/{id}','Api\CartController@add');
        Route::post('edit/cart/{id}','Api\CartController@update_item');
        Route::post('cart/update/quantity/{id}','Api\CartController@update_quantity');
        Route::post('remove/cart/{id}','Api\CartController@delete');
        Route::post('my/cart','Api\CartController@my_cart');
        Route::post('empty/cart','Api\CartController@empty_cart');

        /* Favourits */
        Route::post('add/favourite/{id}','Api\FavouritController@add');
        Route::post('my/favourites','Api\FavouritController@my');


        /* Address */
        Route::post('add/address','Api\AddressController@add');
        Route::post('edit/address/{id}','Api\AddressController@edit');
        Route::post('delete/address/{id}','Api\AddressController@delete');
        Route::post('my/addresses','Api\AddressController@my');


        /* orders */
        Route::post('add/order','Api\OrderController@add');
        Route::post('my/orders','Api\OrderController@my');
        Route::post('single/order/{id}','Api\OrderController@single');


        /* refunds */
        Route::post('refund/product','Api\RefundController@refund');
        

        /* reviews */
        Route::post('add/review/{id}','Api\ReviewController@add'); 
        Route::post('product/review/{id}','Api\ReviewController@product'); 


        /* reports  */
        Route::post('add/report','Api\ReportController@add'); 
        Route::post('report/types','Api\ReportController@index'); 


        /* cobon */
        Route::post('check/cobon','Api\CobonController@check_cobon');
});

Route::post('drivers/login','Api\Driver\UserController@login');