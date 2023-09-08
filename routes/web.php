<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/down',function(){
    Artisan::call('down');
});

Route::get('/up',function(){
    Artisan::call('up');
});
Route::get('/migrate',function(){
    Artisan::call('migrate', ["--force"=> true ]);
});



Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/session-clear', 'HomeController@sessionClear')->name('session_clear');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/products/{slug}', 'HomeController@allProducts')->name('products');

Route::get('product-price', 'HomeController@getPrice')->name('product.price');
Route::get('product/{product_slug}', 'HomeController@productCalculator')->name('product_calculator');
Route::get('new-section/', 'HomeController@newSection')->name('product.new_section');

Route::get('/cart', 'User\ProductController@cart')->name('cart');
Route::post('/add-to-cart/', 'User\ProductController@addToCart')->name('product.add_cart');
Route::get('/remove-cart/{product}', 'User\ProductController@removeFromCart')->name('product.remove_cart');
Route::post('/update-price/{product}', 'User\ProductController@updatePrice')->name('product.update_price');
Route::post('update-grand-total', 'User\ProductController@grandTotal')->name('product.grand_total');
Route::get('checkout', 'User\ProductController@checkOut')->name('product.check_out');
Route::get('/approx-width', 'User\ProductController@fontWidth')->name('product.approx_width');
Route::get('one-step-checkout/', 'User\ProductController@shippingAddress')->name('product.shipping_address');
Route::post('one-step-checkout/store', 'User\ProductController@storeShippingAddress')->name('shipping_address.store');
Route::get('checkout/success/{id}', 'User\ProductController@success')->name('product.success');
Route::get('make-payment-paypal', 'User\ProductController@makePaymentPayPal')->name('make-payment-paypal');
Route::post('checkout-paypal', 'User\ProductController@processPayPalCheckout')->name('processCheckoutPaypal');
Route::get('status/{id}', 'User\ProductController@getPaymentStatus')->name('payment_status');


Route::get('terms-and-condition', 'HomeController@termandcondition')->name('termandcondition');
Route::get('privacy-and-policy', 'HomeController@privacyPolicy')->name('privacy_policy');
Route::get('shipping-rates', 'HomeController@shippingrates')->name('shipping_rates');

Route::get('alum-number-new-section/', 'HomeController@newSectionAlumNumber')->name('product.new_section_alum_number');
Route::get('aluminum-new-section/', 'HomeController@alumNewSection')->name('product.new_section_alum');
Route::get('faqs', 'HomeController@FAQs')->name('faqs');
Route::get('contact-us', 'HomeController@contact_us')->name('contact_us');
Route::get('about-us', 'HomeController@aboutUs')->name('about_us');
Route::get('designhelp', 'HomeController@designhelp')->name('designhelp');
Route::get('email', 'EmailController@sendEmail');
Route::get('table', 'HomeController@table');
Route::get('custome-sign', 'HomeController@customsign')->name('customsign');
Route::get('sign-form', 'HomeController@signform')->name('signform');
Route::get('sub-category/{slug}', 'HomeController@subCategory')->name('theme.sub_category');
Route::post('contact-store', 'HomeController@storeContact')->name('contact_form.store');
Route::post('subscribe', 'HomeController@storeSubscribe')->name('subscribe.store');
Route::get('article-page/{slug}', 'HomeController@articlepage')->name('article-page');




Route::get('send-bulk-mail', 'EmailController@sendBulkMail')->name('send-bulk-mail');
Route::get('queue-work', 'EmailController@queueWork')->name('queue:work');
Route::get('queue-pause', 'EmailController@queueStop')->name('queue:pause');

//web.php

Route::get('image/upload', 'User/ProductController@fileCreate');
Route::post('image/upload/store', 'User/ProductController@fileStore');
Route::post('image/delete', 'User/ProductController@fileDestroy');


Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
});
Route::group([
    'middleware' => ['auth'],
    'middleware' => 'verified',
    'prefix' => 'user',
    'namespace' => 'User'
], function () {
    Route::get('/dashboard', 'UserController@index')->name('user.dashboard');
    Route::get('/profile-setting', 'UserController@profileSetting')->name('user.profile');
    Route::post('/profile-setting', 'UserController@updateProfile')->name('user.profile');
    Route::get('/cache-clear', 'UserController@configCache')->name('user.cache_clear');

    Route::get('/notifications', 'UserController@notifications')->name('user.notifications');

});

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


});
Route::group([
    'middleware' => ['auth:admin'],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@edit')->name('admin-profile');
    Route::post('/admin-update', 'AdminController@update')->name('admin-update');


    //Setting Routes
    Route::resource('setting', 'SettingController');
    Route::get('/cache-clear', 'AdminController@configCache')->name('admin.cache_clear');

    //User Routes
    Route::resource('users', 'UsersController');
    Route::get('users/edit/{id}', 'UsersController@edit')->name('admin-edit');
    Route::post('get-users', 'UsersController@getUsers')->name('admin.getUsers');
    Route::post('get-user', 'UsersController@userDetail')->name('admin.getUser');
    Route::get('users/delete/{id}', 'UsersController@destroy')->name('user-delete');
    Route::post('delete-selected-users', 'UsersController@DeleteSelectedUsers')->name('delete-selected-users');
    Route::get('edit-profile/{id}', 'UsersController@show')->name('edit-profile');

    //Message Routes
    Route::resource('messages', 'MessageController');
    Route::get('messages/edit/{id}', 'MessageController@edit')->name('admin.edit_message');
    Route::post('get-messages', 'MessageController@getMessages')->name('admin.getMessages');
    Route::post('get-message', 'MessageController@messageDetail')->name('admin.getMessage');
    Route::get('messages/delete/{id}', 'MessageController@destroy')->name('admin.deleteMessage');
    Route::post('delete-selected-messages', 'MessageController@deleteSelectedMessages')->name('admin.deleteSelectedMessages');

    //Categories Routes
    Route::resource('categories', 'CategoryController');
    Route::post('get-categories', 'CategoryController@getCategories')->name('admin.getCategories');
    Route::post('get-category', 'CategoryController@categoryDetail')->name('admin.getCategory');
    Route::get('categories/delete/{id}', 'CategoryController@destroy');
    Route::post('delete-selected-categories', 'CategoryController@deleteSelectedCategories')->name('admin.deleteSelectedCategories');

    //Sub Categories Routes
    Route::get('category/{id}/sub-categories', 'SubCategoryController@index')->name('sub-categories.index');
    Route::get('sub-category/create', 'SubCategoryController@create')->name('sub-categories.create');
    Route::post('sub-category/store', 'SubCategoryController@store')->name('sub-categories.store');
    Route::get('sub-category/edit/{id}', 'SubCategoryController@edit')->name('sub-categories.edit');
    Route::patch('sub-category/update/{id}', 'SubCategoryController@update')->name('sub-categories.update');
    Route::post('get-sub-category', 'SubCategoryController@categoryDetail')->name('admin.getSubCategory');
    Route::get('sub-categories/delete/{id}', 'SubCategoryController@destroy');
    Route::post('delete-selected-sub-categories', 'SubCategoryController@deleteSelectedCategories')->name('admin.deleteSelectedSubCategories');


    //Inner Categories Routes
    Route::get('sub-categories/{id}/inner-categories', 'InnerSubCategoryController@index')->name('inner-sub-categories.index');
    Route::get('inner-sub-category/create', 'InnerSubCategoryController@create')->name('inner-sub-categories.create');
    Route::post('inner-sub-category/store', 'InnerSubCategoryController@store')->name('inner-sub-categories.store');
    Route::get('inner-sub-category/edit/{id}', 'InnerSubCategoryController@edit')->name('inner-sub-categories.edit');
    Route::patch('inner-sub-category/update/{id}', 'InnerSubCategoryController@update')->name('inner-sub-categories.update');
    Route::post('get-inner-sub-category', 'InnerSubCategoryController@categoryDetail')->name('admin.getInnerSubCategory');
    Route::get('inner-sub-categories/delete/{id}', 'InnerSubCategoryController@destroy');
    Route::post('delete-selected-inner-sub-categories', 'InnerSubCategoryController@deleteSelectedCategories')->name('admin.deleteSelectedInnerCategories');

    //Product Routes
    Route::resource('products', 'ProductController');
    Route::post('get-products', 'ProductController@getProducts')->name('admin.getProducts');
    Route::post('get-product', 'ProductController@productDetail')->name('admin.getProduct');
    Route::get('products/delete/{id}', 'ProductController@destroy')->name('product-delete');
    Route::post('delete-selected-products', 'ProductController@deleteSelectedRows')->name('delete-selected-products');
    Route::get('select-sub-categories/ajax/', array('as' => 'subcategories.ajax', 'uses' => 'ProductController@subCategories'));
    Route::get('select-inner-sub-categories/ajax/', array('as' => 'innersubcategories.ajax', 'uses' => 'ProductController@innerSubCategories'));

    Route::post('products/image/save', 'ProductController@saveProductsImages')->name('admin.saveProductsImages');
    Route::get('products/remove/{id}', 'ProductController@deleteImage')->name('remove-image');
    Route::get('image/image-product-delete/{id}', 'ProductController@deleteProductImage')->name('admin.delete_product_image');


//  Route::get('/step-one-form', 'ProductController@form')->name('form');
    Route::get('/step-two-form/{id}', 'ProductController@stepTwoForm')->name('step_two_form');
    Route::get('/step-three-form/{id}', 'ProductController@stepThreeForm')->name('step_three_form');
    Route::post('/form-two', 'ProductController@storeFormTwo')->name('form_two');
    Route::post('/form-three', 'ProductController@storeFormThree')->name('form_three');

    Route::get('store-products', 'ProductController@storeProducts');
    Route::get('get-all-products', 'ProductController@getAllProducts');


    //Question Routes
    Route::resource('questions', 'QuestionController');
    Route::post('get-questions', 'QuestionController@getQuestions')->name('admin.getQuestions');
    Route::post('get-question', 'QuestionController@questionDetail')->name('admin.getQuestion');
    Route::get('questions/delete/{id}', 'QuestionController@destroy')->name('question-delete');
    Route::post('delete-selected-questions', 'QuestionController@deleteSelectedQuestions')->name('delete-selected-questions');
    Route::post('update-questions-order', 'QuestionController@updateQuestionsOrder')->name('update_questions');

    //Section Routes
    Route::resource('sections', 'SectionController');

    //Activity Log Controller
    Route::resource('logs', 'ActivityLogController');

    //Order Routes
    Route::resource('orders', 'OrderController');
    Route::post('get-orders', 'OrderController@getOrders')->name('admin.getOrders');
    Route::get('order-details/{id}', 'OrderController@orderDetail')->name('admin.getOrder');
    Route::get('orders/delete/{id}', 'OrderController@destroy')->name('admin.deleteOrder');
    Route::post('delete-selected-orders', 'OrderController@deleteSelectedOrders')->name('admin.deleteSelectedOrders');


    //Order Routes
    Route::resource('fonts', 'FontController');
    Route::post('get-fonts', 'FontController@getFonts')->name('admin.getFonts');
    Route::post('get-font', 'FontController@fontDetail')->name('admin.getFont');
    Route::get('fonts/delete/{id}', 'FontController@destroy')->name('admin.deleteFont');
    Route::post('delete-selected-fonts', 'FontController@deleteSelectedOrders')->name('admin.deleteSelectedFonts');

    //Contact Routes
    Route::resource('contacts', 'ContactController');
    Route::post('get-contacts', 'ContactController@getContacts')->name('admin.getContacts');
    Route::post('get-contact', 'ContactController@contactDetail')->name('admin.getContact');
    Route::get('contacts/delete/{id}', 'ContactController@destroy')->name('admin.deleteContact');
    Route::post('delete-selected-contacts', 'ContactController@deleteSelectedContacts')->name('admin.deleteSelectedContacts');

    //Blog Categories Routes
    Route::resource('blog-categories', 'BlogCategoryController');
    Route::post('get-blog-categories', 'BlogCategoryController@getBlogCategories')->name('admin.getBlogCategories');
    Route::post('get-blog-category', 'BlogCategoryController@blogCategoryDetail')->name('admin.getBlogCategory');
    Route::get('blog-categories/delete/{id}', 'BlogCategoryController@destroy');
    Route::post('delete-selected-blog-categories', 'BlogCategoryController@deleteSelectedBlogCategories')->name('admin.deleteSelectedBlogCategories');

    //Blog Post Routes
    Route::resource('blog-posts', 'BlogPostController');
    Route::post('get-blog-posts', 'BlogPostController@getBlogPosts')->name('admin.getBlogPosts');
    Route::post('get-blog-post', 'BlogPostController@blogPostDetail')->name('admin.getBlogPost');
    Route::get('blog-posts/delete/{id}', 'BlogPostController@destroy');
    Route::post('delete-selected-blog-posts', 'BlogPostController@deleteSelectedBlogPosts')->name('admin.deleteSelectedBlogPosts');

    //Subscriber Routes
    Route::resource('subscribers', 'SubscriberController');
    Route::post('get-subscribers', 'SubscriberController@getSubscribers')->name('admin.getSubscribers');
    Route::post('get-subscriber', 'SubscriberController@subscriberDetail')->name('admin.getSubscriber');
    Route::get('subscribers/delete/{id}', 'SubscriberController@destroy');
    Route::post('delete-selected-subscribers', 'SubscriberController@deleteSelectedSubscribers')->name('admin.deleteSelectedSubscribers');


});

//Auth::routes();


