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

// Auth Login

Route::get('mail', function () {
    return view('mail');
});


Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/', 'FrontController@index');

Route::get('/login', 'CheckLoginController@index')->name('signinform');

Route::get('/signup', function () {
    if (Auth::user()->roles == 'customers') {
        return redirect('/dashboard');
    } else {
        return view('frontend.pages.signup');
    }
})->name('signupform');

Route::get('products/{slug}', 'FrontController@singleProduct')->name('single-product');

Route::get('/index', function () {
    return view('frontend.pages.index1');
});
//Route::get('/quick/{slug}', 'ProductController@quickView')->name('quickview');
Route::get('/blog/{slug}', 'FrontController@BlogDetail')->name('blog-detail');
Route::get('/blogs', 'FrontController@Blog');
Route::get('/shop', 'FrontController@shop')->name('shopPage');

Route::get('categories/{primary_cat}','FrontController@categories')->name('categories');
Route::get('categories/{primary_cat}/{secondary_cat}','FrontController@categories')->name('categories.sec');
// Route::get('/categories/{name}', 'FrontController@categories')->name('categories');
Route::get('/shopping-cart', function () {
    return view('frontend.pages.shopping-cart');
});
Route::get('/checkout', function () {
    return view('frontend.pages.checkout');
});
// Route::get('/review', function () {
//     return view('frontend.pages.checkout-review');
// });

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/forgot-password', function () {
    return view('frontend.pages.password');
});
Auth::routes();

Route::get('/get-city/{id}', 'FrontController@getCity');

Route::get('/get-area/{id}', 'FrontController@getArea');

//facebook and google login
Route::get('login/{service}', 'UserController@redirectToProvider');
Route::get('login/{service}/callback', 'UserController@handleProviderCallback');


// Admin Routes

Route::delete('/product-delete', 'ProductController@ajaxDestroy')->name('ajax.products');
Route::delete('/categories-delete', 'CategoryController@ajaxDestroy')->name('ajax.categories');
Route::delete('/users-delete', 'UserController@ajaxDestroy')->name('ajax.users');

Route::get('/colors', 'ColorController@getColors')->name('colors');

Route::post('/sizes', 'SizeController@getSizes')->name('getsize');

Route::post('/get_wholesale', 'WholesaleController@getWholesale')->name('getWholesale');

Route::post('/get_wholesale_detail', 'WholesaleController@getDetail')->name('getWholeSaleDetail');

Route::post('/get_similar', 'ProductController@getSimilar')->name('getSimilar');

Route::get('/get_suk/{id}', 'ProductController@getSuk')->name('getSuk');

Route::post('/check-warranty', 'FrontController@warranty')->name('warranty_check');

Route::post('/login', 'UserController@login')->name('login');

Route::post('/customer/login', 'UserController@CustomerLogin')->name('customerlogin');

Route::post('/customer/signup', 'UserController@customerSignUp')->name('customerSignUp');

// Route::patch('user-edit/{id}', 'UserController@UpdateUser')->name('update_user');

Route::get('/cart', function () {
    return view('frontend.pages.cart');
});

Route::get('/review', 'FrontController@review');

Route::get('/page/{slug}', 'FrontController@page')->name('pageDetail');

Route::get('/esewa', 'FrontController@eSewa')->name('eSewa');

Route::resource('cart', 'CartController');

Route::get('/clear-cart', 'CartController@destroyCart')->name('destroyCart');

Route::patch('/update-cart/{id}', 'CartController@updateCart')->name('update.cart');

// Route::get('/quick-view/{id}', 'ProductController@quickview')->name('quick');

Route::get('quick_view/{id}', 'ProductController@quickView')->name('quick_view');

Route::get('/checkout/payment/esewa', [
    'name' => 'eSewa Checkout Payment',
    'as' => 'checkout.payment.esewa',
    'uses' => 'EsewaController@checkout',
]);

Route::get('/checkout/payment/success/esewa', [
    'name' => 'eSewa Checkout Successful Payment',
    'as' => 'checkout.payment.success.esewa',
    'uses' => 'EsewaController@success',
]);

Route::post('/checkout/payment/esewa/process', [
    'name' => 'eSewa Checkout Payment',
    'as' => 'checkout.payment.esewa.process',
    'uses' => 'EsewaController@payment',
]);

Route::get('/checkout/payment/{order}/esewa/completed', [
    'name' => 'eSewa Payment Completed',
    'as' => 'checkout.payment.esewa.completed',
    'uses' => 'EsewaController@completed',
]);

Route::get('/checkout/payment/{order}/failed', [
    'name' => 'eSewa Payment Failed',
    'as' => 'checkout.payment.esewa.failed',
    'uses' => 'EsewaController@failed',
]);

// senstive
// Route::post('/product-available-size/{id}', 'ProductSizeController@GetAvailableSize');
// Route::post('get-stock/', 'ProductSizeController@getstock')->name('getstock');

Route::get('user/address/{id}', 'AddressBookController@userAddress')->name('user.address');
Route::resource('orders', 'OrderController');

Route::resource('/new_order', 'NewOrderController');

Route::get('/get_cart_content/', 'FrontController@cartContent')->name('cart.content');

Route::get('/get_cart_count/', 'CartController@cartCount')->name('cart.count');

Route::group(['prefix' => 'auth', 'middleware' => ['auth']], function () {

    Route::get('/expenses', 'ProductExpenseController@index')->name('record-list');

    Route::get('/dashboard','DashboardController@index');

    Route::get('inquiry/{inquiry}','DashboardController@inquries')->name('inquiry');

    Route::get('/media', function () {
        return view('admin.pages.fileupload');
    });

    Route::get('/expense-edit/{id}', 'ProductExpenseController@edit')->name('expense_edit');

    Route::match(['put', 'patch'], '/expense-update/{id}', 'ProductExpenseController@update')->name('expense_update');

    Route::resource('sales', 'SalesController');

    // Route::post('/product-available-color/{id}', 'ProductSizeController@GetAvailableColor');
    Route::get('/get_product_price/{id}', 'ProductController@getSet');

    Route::get('/get_attribute/{id}', 'CategoryAttributeController@getAttribute');

    Route::get('/get_attribute_value/{id}', 'CategoryAttributeController@getAttributeValue');

    Route::get('/get_attribute_data/{id}', 'CategoryAttributeController@getAttributeData');

    // Route::post('/admin/get-account/', 'AccountController@getAccounts')->name('getaccounts');

    Route::delete('/product-images-delete', 'ProductImageController@destroyProductImages')->name('delete_product_images');

    Route::delete('/product-sizes-delete', 'ProductSizeController@destroyProductSizes')->name('delete_product_sizes');

    // categories
    Route::get('parentcategories', 'ProductCategoryController@getParentController')->name('parentCategories');

    Route::get('postparentcategories', 'CategoryController@getParentController')->name('postparentCategories');

    Route::get('last-post', 'CategoryController@lastData')->name('lastPost');

    Route::get('last', 'ProductCategoryController@lastData')->name('lastData');

    Route::get('/categoryedit/{slug}', 'ProductCategoryController@editCategory')->name('editCategory');

    Route::get('/postcategoryedit/{slug}', 'CategoryController@editPostCategory')->name('editPostCategory');

    Route::get('/brandedit/{slug}', 'BrandController@editBrand')->name('editBrand');

    Route::resource('products', 'ProductController');

    Route::resource('brands', 'BrandController');

    Route::resource('sizes', 'SizeController');

    Route::resource('attributes', 'ProductAttributeController');

    Route::resource('product_categories', 'ProductCategoryController');

    Route::resource('users', 'UserController');
    Route::post('user/{user_id}/update', 'UserController@updateProfile')->name('user.profile');
    Route::get('user/{user_id}/info', 'UserController@userInfo')->name('user.info');
    Route::get('user/{user_id}/info/{product_id}/product','ProductController@showProduct')->name('user.product');

    Route::resource('blogs', 'BlogController');

    Route::resource('payments', 'PaymentController');

    Route::resource('category', 'CategoryController');

    Route::resource('sliders', 'SliderController');

    Route::resource('ads', 'AdsController');

    Route::resource('page', 'PageController');

    Route::resource('brands', 'BrandController');

    Route::get('brandlast', 'BrandController@brandLastData')->name('brandLastData');

    Route::resource('sizes', 'SizeController');

    Route::resource('accounts', 'AccountController');

    Route::resource('areas', 'AreaController');

    Route::resource('cities', 'CityController');

    Route::resource('primary_categories', 'PrimaryCategoryController');

    Route::resource('secondary_categories', 'SecondaryCategoryController');

    Route::resource('settings', 'SensitiveDataController')->middleware('admin');

    Route::get('/primary_last', 'PrimaryCategoryController@lastData')->name('PrimarylastData');

    Route::get('/primary_category_edit/{slug}', 'PrimaryCategoryController@editPrimaryCategory')->name('editPrimaryCategory');

    Route::get('primarycategories', 'PrimaryCategoryController@getPrimaryController')->name('primaryCategories');

    Route::get('/secondary_last', 'SecondaryCategoryController@lastData')->name('SecondarylastData');

    Route::get('/secondary_category_edit/{slug}', 'SecondaryCategoryController@editSecondaryCategory')->name('editSecondaryCategory');

    // Route::get('last-payment','PaymentController@lastPaymentData')->name('lastPaymentData');

    // vendor produt
    Route::post('/get_vendor_post','ProductController@getVendorProduct')->name('VendorProduct');

    // Route::get('last-payment', 'PaymentController@lastPaymentData')->name('lastPaymentData');

});
Route::group(['middleware' => ['auth', 'customers']], function () {
    Route::get('/dashboard','CustomerController@dashboard')->name('customer.dashboard');

    Route::get('/account-information', 'CustomerController@accountInfo')->name('customer.account');
    Route::patch('/account-information', 'CustomerController@accountUpdate')->name('customer.account.update');
    Route::get('/change-password', 'CustomerController@changePasswordForm')->name('customer.changepassword.form');
    Route::patch('/change-password', 'CustomerController@changePassword')->name('customer.changepassword');
    Route::get('/purchased-product', 'CustomerController@purchasedProduct')->name('customer.purchase');
    Route::get('/ordered-product', 'CustomerController@orderedProduct')->name('customer.ordered');

    Route::get('/add-address', 'FrontController@addressBookAdd')->name('addressList');

    Route::get('/address-book', 'AddressBookController@index');

    Route::resource('address', 'AddressBookController');

    Route::get('/shipping', 'FrontController@shipping');
});

Route::group(['prefix' => 'vendor', 'middleware' => ['auth', 'vendor']], function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.index');
    });
});

Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'employee']], function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.index');
    });
});
