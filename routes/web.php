<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify'=>true,'logout'=>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['middleware'=>['auth:admin'],'namespace'=>'Admin','prefix'=>'admin'], function(){
    Route::group(['prefix'=>'category', 'namespace'=>'Category'], function(){
        Route::get('/','CategoryController@index')->name('admin.category.index');
        Route::post('/store','CategoryController@store')->name('admin.category.store');
        Route::get('/{category}/edit','CategoryController@edit')->name('admin.category.edit');
        Route::PUT('/{category}/update','CategoryController@update')->name('admin.category.update');
        Route::get('/{category}/delete','CategoryController@destroy')->name('admin.category.destroy');

        Route::get('/{category}/get-all-category','CategoryController@getAllSubCategories');
    });

    Route::group(['prefix'=>'brand', 'namespace'=>'Brand'], function(){
        Route::get('/','BrandController@index')->name('admin.brand.index');
        Route::post('/store','BrandController@store')->name('admin.brand.store');
        Route::get('/{brand}/edit','BrandController@edit')->name('admin.brand.edit');
        Route::PUT('/{brand}/update','BrandController@update')->name('admin.brand.update');
        Route::get('/{brand}/delete','BrandController@destroy')->name('admin.brand.destroy');
    });

    Route::group(['prefix'=>'subcategory', 'namespace'=>'Subcategory'], function(){
        Route::get('/','SubcategoryController@index')->name('admin.subcategory.index');
        Route::post('/store','SubcategoryController@store')->name('admin.subcategory.store');
        Route::get('/{subcategory}/edit','SubcategoryController@edit')->name('admin.subcategory.edit');
        Route::PUT('/{subcategory}/update','SubcategoryController@update')->name('admin.subcategory.update');
        Route::get('/{subcategory}/delete','SubcategoryController@destroy')->name('admin.subcategory.destroy');
    });

    Route::group(['prefix'=>'coupon', 'namespace'=>'Coupon'], function(){
        Route::get('/','CouponController@index')->name('admin.coupon.index');
        Route::post('/store','CouponController@store')->name('admin.coupon.store');
        Route::get('/{coupon}/edit','CouponController@edit')->name('admin.coupon.edit');
        Route::PUT('/{coupon}/update','CouponController@update')->name('admin.coupon.update');
        Route::get('/{coupon}/delete','CouponController@destroy')->name('admin.coupon.destroy');
    });


    Route::group(['prefix'=>'product', 'namespace'=>'Product'], function(){
        Route::get('/','ProductController@index')->name('admin.product.index');
        Route::get('/create','ProductController@create')->name('admin.product.create');
        Route::post('/store','ProductController@store')->name('admin.product.store');
        Route::get('/{product}','ProductController@show')->name('admin.product.show');
        Route::get('/{product}/edit','ProductController@edit')->name('admin.product.edit');
        Route::PUT('/{product}/update','ProductController@update')->name('admin.product.update');
        Route::get('/{product}/delete','ProductController@destroy')->name('admin.product.destroy');

        Route::get('/{product}/active','ProductController@active')->name('admin.product.active');
        Route::get('/{product}/inactive','ProductController@inactive')->name('admin.product.inactive');
    });


    Route::group(['prefix'=>'newslater', 'namespace'=>'Newslater'], function(){
        Route::get('/','NewslaterController@index')->name('admin.newslater.index');
        Route::get('/{newslater}/delete','NewslaterController@destroy')->name('admin.newslater.destroy');
    });


});

Route::post('/newslater/store','NewslaterController@store')->name('newslater.store');

