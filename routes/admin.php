<?php 
   

   Route::get('logout','Admin\AdminController@admin_logout');
   Route::get('login','Admin\AdminController@login');
   Route::post('login','Admin\AdminController@postLogin');
   
   Route::group(['middleware'=>'admin'],function(){

    Route::get('/','Admin\AdminController@index');
    // profile
    Route::get('profile','Admin\AdminController@profile');
    Route::post('profile','Admin\AdminController@postProfile');

    //pages
    Route::get('pages','Admin\PageController@index');
    Route::get('pages/add','Admin\PageController@add');
    Route::post('pages/add','Admin\PageController@post_add');
    Route::get('pages/edit/{id}','Admin\PageController@edit');
    Route::get('pages/delete/{id}','Admin\PageController@delete');
    Route::post('pages/edit/{id}','Admin\PageController@post_edit');


    //departments
    Route::get('departments','Admin\DepartmentController@index');
    Route::get('departments/add','Admin\DepartmentController@add');
    Route::post('departments/add','Admin\DepartmentController@postAdd');
    Route::get('departments/edit/{id}','Admin\DepartmentController@edit');
    Route::post('departments/edit/{id}','Admin\DepartmentController@postEdit');

    //categories
    Route::get('categories','Admin\CategoryController@index');
    Route::get('categories/add','Admin\CategoryController@add');
    Route::post('categories/add','Admin\CategoryController@postAdd');
    Route::get('categories/edit/{id}','Admin\CategoryController@edit');
    Route::post('categories/edit/{id}','Admin\CategoryController@postEdit');

    //countries
    Route::get('countries','Admin\CountryController@index');
    Route::get('countries/add','Admin\CountryController@add');
    Route::post('countries/add','Admin\CountryController@postAdd');
    Route::get('countries/edit/{id}','Admin\CountryController@edit');
    Route::get('countries/delete/{id}','Admin\CountryController@delete');
    Route::post('countries/edit/{id}','Admin\CountryController@postEdit');

    //cities
    Route::get('cities','Admin\CityController@index');
    Route::get('country/change/{id}','Admin\CityController@country_change');
    Route::get('cities/add','Admin\CityController@add');
    Route::post('cities/add','Admin\CityController@postAdd');
    Route::get('cities/edit/{id}','Admin\CityController@edit');
    Route::get('cities/delete/{id}','Admin\CityController@delete');
    Route::post('cities/edit/{id}','Admin\CityController@postEdit');

    //regions
    Route::get('regions','Admin\RegionController@index');
    Route::get('regions/add','Admin\RegionController@add');
    Route::post('regions/add','Admin\RegionController@postAdd');
    Route::get('regions/edit/{id}','Admin\RegionController@edit');
    Route::get('regions/delete/{id}','Admin\RegionController@delete');
    Route::post('regions/edit/{id}','Admin\RegionController@postEdit');

    //vendors
    Route::get('vendors','Admin\VendorController@index');
    Route::get('vendors/add','Admin\VendorController@add');
    Route::post('vendors/add','Admin\VendorController@postAdd');
    Route::get('vendors/edit/{id}','Admin\VendorController@edit');
    Route::get('vendors/activate/{id}','Admin\VendorController@activate');
    Route::post('vendors/edit/{id}','Admin\VendorController@postEdit');

    //vendors
    Route::get('stores/{id}','Admin\StoreController@index');
    Route::get('stores/add/{id}','Admin\StoreController@add');
    Route::post('stores/add/{id}','Admin\StoreController@postAdd');
    Route::get('stores/edit/{id}','Admin\StoreController@edit');
    Route::get('stores/activate/{id}','Admin\StoreController@activate');
    Route::post('stores/edit/{id}','Admin\StoreController@postEdit');

    Route::get('check/departments','Admin\DepartmentController@change_department');


    //colors
    Route::get('colors','Admin\ColorController@index');
    Route::get('colors/add','Admin\ColorController@add');
    Route::post('colors/add','Admin\ColorController@postAdd');
    Route::get('colors/edit/{id}','Admin\ColorController@edit');
    Route::get('colors/delete/{id}','Admin\ColorController@delete');
    Route::post('colors/edit/{id}','Admin\ColorController@postEdit');


    //brands
    Route::get('brands','Admin\BrandController@index');
    Route::get('brands/add','Admin\BrandController@add');
    Route::post('brands/add','Admin\BrandController@postAdd');
    Route::get('brands/edit/{id}','Admin\BrandController@edit');
    Route::get('brands/delete/{id}','Admin\BrandController@delete');
    Route::post('brands/edit/{id}','Admin\BrandController@postEdit');


    //sliders
    Route::get('sliders','Admin\SliderController@index');
    Route::get('sliders/add','Admin\SliderController@add');
    Route::post('sliders/add','Admin\SliderController@postAdd');
    Route::get('sliders/edit/{id}','Admin\SliderController@edit');
    Route::get('sliders/delete/{id}','Admin\SliderController@delete');
    Route::post('sliders/edit/{id}','Admin\SliderController@postEdit');



    //products
    Route::get('products/{id}','Admin\ProductController@index');
    Route::get('products/add/{id}','Admin\ProductController@add');
    Route::post('products/add/{id}','Admin\ProductController@postAdd');
    Route::get('products/edit/{id}','Admin\ProductController@edit');
    Route::get('products/delete/{id}','Admin\ProductController@delete');
    Route::post('products/edit/{id}','Admin\ProductController@postEdit');
    Route::get('products/import/{id}','Admin\ProductController@import');
    Route::post('products/import/{id}','Admin\ProductController@postImport');
    Route::get('products/filters/{id}','Admin\ProductFilterController@add');
    Route::post('products/filters/{id}','Admin\ProductFilterController@post_add');


    //sizes
    Route::get('sizes','Admin\SizeController@index');
    Route::get('sizes/add','Admin\SizeController@add');
    Route::post('sizes/add','Admin\SizeController@postAdd');
    Route::get('sizes/edit/{id}','Admin\SizeController@edit');
    Route::get('sizes/delete/{id}','Admin\SizeController@delete');
    Route::post('sizes/edit/{id}','Admin\SizeController@postEdit');

    //restaurant/menu
    Route::get('restaurant/menu/{id}','Admin\StoreMenuController@index');
    Route::get('restaurant/menu/add/{id}','Admin\StoreMenuController@add');
    Route::post('restaurant/menu/add/{id}','Admin\StoreMenuController@postAdd');
    Route::get('restaurant/menu/edit/{id}','Admin\StoreMenuController@edit');
    Route::get('restaurant/menu/delete/{id}','Admin\StoreMenuController@delete');
    Route::post('restaurant/menu/edit/{id}','Admin\StoreMenuController@postEdit');

    
    // restaurant items 
    Route::get('restaurant/items/add/{id}','Admin\ItemController@add');
    Route::post('restaurant/items/add/{id}','Admin\ItemController@postAdd');
    Route::get('restaurant/items/edit/{id}','Admin\ItemController@edit');
    Route::post('restaurant/items/edit/{id}','Admin\ItemController@postEdit');


    //ads
    Route::get('ads','Admin\AdsController@index');
    Route::get('ads/add','Admin\AdsController@add');
    Route::post('ads/add','Admin\AdsController@postAdd');
    Route::get('ads/edit/{id}','Admin\AdsController@edit');
    Route::get('ads/delete/{id}','Admin\AdsController@delete');
    Route::post('ads/edit/{id}','Admin\AdsController@postEdit');


    //offers
    Route::post('add/offer/{id}','Admin\OfferController@add');
    Route::get('produt/offers/{id}','Admin\OfferController@product_offers');
    Route::get('offers/delete/{id}','Admin\OfferController@delete');
    Route::post('product/offer/{id}','Admin\OfferController@add_product');
    Route::post('edit/product/offer/{id}','Admin\OfferController@edit_product');
    Route::get('store/offers/{id}','Admin\OfferController@store');


    //paymentways
    Route::get('paymentways','Admin\PaymentWayController@index');
    Route::get('paymentways/add','Admin\PaymentWayController@add');
    Route::post('paymentways/add','Admin\PaymentWayController@postAdd');
    Route::get('paymentways/edit/{id}','Admin\PaymentWayController@edit');
    Route::get('paymentways/delete/{id}','Admin\PaymentWayController@delete');
    Route::post('paymentways/edit/{id}','Admin\PaymentWayController@postEdit');

    //deliverytypes
    Route::get('deliverytypes','Admin\DeliveryTypeController@index');
    Route::get('deliverytypes/add','Admin\DeliveryTypeController@add');
    Route::post('deliverytypes/add','Admin\DeliveryTypeController@postAdd');
    Route::get('deliverytypes/edit/{id}','Admin\DeliveryTypeController@edit');
    Route::get('deliverytypes/delete/{id}','Admin\DeliveryTypeController@delete');
    Route::post('deliverytypes/edit/{id}','Admin\DeliveryTypeController@postEdit');

    //questions
    Route::get('questions','Admin\CommonQuestionController@index');
    Route::get('questions/add','Admin\CommonQuestionController@add');
    Route::post('questions/add','Admin\CommonQuestionController@postAdd');
    Route::get('questions/edit/{id}','Admin\CommonQuestionController@edit');
    Route::get('questions/delete/{id}','Admin\CommonQuestionController@delete');
    Route::post('questions/edit/{id}','Admin\CommonQuestionController@postEdit');


    // orders
    Route::get('orders','Admin\OrderController@index');
    Route::get('orders/view/{id}','Admin\OrderController@single');
    Route::get('vendor/orders/{id}','Admin\OrderController@vendors');

    // refunds 
    Route::get('refunds','Admin\RefundController@index');
    Route::get('refunds/confirm/{id}','Admin\RefundController@confirm');
    Route::get('vendor/refunds/{id}','Admin\RefundController@vendors');


    //settings
    Route::get('settings','Admin\SettingController@index');
    Route::post('settings','Admin\SettingController@edit');


    // payments
    Route::get('payments/vendors','Admin\PaymentController@vendors');
    Route::get('payments/processes','Admin\PaymentController@process');
    Route::get('payments/wallet','Admin\PaymentController@wallet');
    Route::get('payments/cash','Admin\PaymentController@cash');


    // users
    Route::get('users/single/{id}','Admin\UserController@single');
    Route::get('users/active/{id}','Admin\UserController@active');
    Route::get('users/edit/{id}','Admin\UserController@edit');
    Route::get('users','Admin\UserController@index');
    Route::post('users/edit/{id}','Admin\UserController@postEdit');


    //reviews 
    Route::get('store/reviews','Admin\ReviewController@index');
    Route::get('store/reviews/delete/{id}','Admin\ReviewController@delete');

    //product reviews
    Route::get('product/reviews','Admin\ProductReviewController@index');
    Route::get('product/reviews/delete/{id}','Admin\ProductReviewController@delete');


    //reports/types
    Route::get('reports/types','Admin\ReportTypeController@index');
    Route::get('reports/types/add','Admin\ReportTypeController@add');
    Route::post('reports/types/add','Admin\ReportTypeController@postAdd');
    Route::get('reports/types/edit/{id}','Admin\ReportTypeController@edit');
    Route::get('reports/types/delete/{id}','Admin\ReportTypeController@delete');
    Route::post('reports/types/edit/{id}','Admin\ReportTypeController@postEdit');

    // user reports
    Route::get('review/reports','Admin\ReportController@index');
    Route::get('review/delete/{id}','Admin\ReportController@delete');


    //category/filters
    Route::get('category/filters/{id}','Admin\CategoryFilterController@index');
    Route::get('category/filters/add/{id}','Admin\CategoryFilterController@add');
    Route::post('category/filters/add/{id}','Admin\CategoryFilterController@postAdd');
    Route::get('category/filters/edit/{id}','Admin\CategoryFilterController@edit');
    Route::get('category/filters/delete/{id}','Admin\CategoryFilterController@delete');
    Route::post('category/filters/edit/{id}','Admin\CategoryFilterController@postEdit');
});