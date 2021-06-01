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


Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/', 'Frontend\LandingPageController@index')->name('index');

Route::get('/cache', function () {

    \Illuminate\Support\Facades\Artisan::call('key:generate');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('storage:link');

    return 'Commands run successfully Cleared.';
});


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/register/{referral_code?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::post('otp', 'Auth\ForgotPasswordController@otp')->name('otp.send');
Route::post('verify/otp', 'Auth\ForgotPasswordController@verifyOTP')->name('verify.otp');
Route::post('forgot-password-request', 'Auth\ForgotPasswordController@ForgotPasswordRequest')->name('otp.password.reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/dashboard', 'Backend\DashboardController');
        Route::resource('/meta-tags', 'Backend\MetaTagController', [
            'only' => ['index', 'create', 'store', 'edit', 'update']
        ]);
        Route::resource('/cities', 'Backend\CityController');
        Route::resource('/areas', 'Backend\AreaController');
        Route::post('/areas/import/file', 'Backend\AreaController@importFile')->name('area.import.excel');
        Route::resource('/partners', 'Backend\UserController');
        Route::post('partners/excel', 'Backend\UserController@export')->name('partners.export');
        Route::resource('/customers', 'Backend\CustomerController');
        Route::post('customers/excel', 'Backend\CustomerController@export')->name('customers.export');
        Route::resource('/blogs', 'Backend\BlogController');
        Route::resource('/category-blogs', 'Backend\BlogCategoryController');
        Route::resource('/tag', 'Backend\TagController');
        Route::resource('/offers', 'Backend\OfferController');
        Route::resource('/orders', 'Backend\OrderController');
        Route::resource('/emailtemplates', 'Backend\EmailTemplatesController');
        Route::resource('/settings', 'Backend\SettingController', [
            'only' => ['index', 'update']
        ]);
        Route::resource('/contacts', 'Backend\ContactUsController', [
            'only' => ['index', 'destroy']
        ]);
        Route::resource('/aboutus', 'Backend\AboutUsController', [
            'only' => ['index', 'store']
        ]);

        Route::resource('/privacypolicy', 'Backend\PrivacyController', [
            'only' => ['index', 'store']
        ]);


        //User Profiles
        Route::get('profile', 'Backend\ProfileController@index')->name('profile.index');

        Route::get('edit/profile', 'Backend\ProfileController@editProfile')->name('profile.edit');
        Route::post('edit/profile/image', 'Backend\ProfileController@editProfileImage')->name('profile.edit.image');
        Route::post('update/profile', 'Backend\ProfileController@updateProfile')->name('update.user.profile');

        Route::get('update/password/', 'Backend\ProfileController@changePassword')->name('update.password');
        Route::post('update/user/password/', 'Backend\ProfileController@updatePassword')->name('update.user.password');

        Route::get('update/phone', 'Backend\ProfileController@changeMobileNumber')->name('update.phone');
        Route::post('update/phone', 'Backend\ProfileController@updateMobileNumber')->name('update.user.phone');


    });


});

//Ajax Routes
Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::get('city_areas', 'Backend\AjaxController@cityArea')->name('cityAreas');
    Route::get('update/order/status', 'Backend\AjaxController@updateOrderStatus')->name('update.status');
});

Route::resource('/contacts', 'Backend\ContactUsController', [
    'only' => ['create', 'store']
]);

Route::get('/contacts', 'Backend\ContactUsController@create')->name('contacts.create');
Route::post('/contacts/store', 'Backend\ContactUsController@store')->name('contacts.store');


//Frontend Routes

//Partners Section
Route::get('/become-a-partner', 'Frontend\PartnerController@becomePartner')->name('become.partner');
Route::post('/save-partner', 'Frontend\PartnerController@savePartner')->name('save.partner');
Route::get('/partners', 'Frontend\PartnerController@existingPartner')->name('existing.partner');
Route::post('load/partners', 'Frontend\PartnerController@loadPartnerAjax')->name('partners.load.more');

//Blogs
Route::get('blogs', 'Frontend\BlogController@index')->name('blog');
Route::get('blog/{slug}', 'Frontend\BlogController@getBlog')->name('blog.show');
Route::post('load/blogs', 'Frontend\BlogController@loadBlogAjax')->name('blog.load.more');
Route::get('category/blog/{slug}', 'Frontend\BlogController@categoryBlog')->name('category.blogs');

//Reviews Section
Route::get('reviews/{id}', 'Frontend\RatingController@index')->name('partner.reviews');
Route::get('rating/{id}', 'Frontend\RatingController@rating')->name('partner.rating');
Route::post('store/rating', 'Frontend\RatingController@ratingStore')->name('partner.rating.store');
Route::post('load/reviews', 'Frontend\RatingController@loadReviewsAjax')->name('reviews.load.more');

//Solar Calculator
Route::get('solar/calculator', 'Frontend\GeneralController@solarCalculator')->name('solar.calculator');
Route::get('privacy-policy', 'Frontend\GeneralController@privacyPolicy')->name('privacy.policy');
Route::get('about-us', 'Frontend\GeneralController@aboutUs')->name('about-us');
Route::get('get-quote-now', 'Frontend\GeneralController@getQuoteNow')->name('get.quote.now');


//Offer Comparison
Route::get('offers', 'Frontend\OfferController@index')->name('offer.comparison.index');
Route::post('book/offer', 'Frontend\OrderController@store')->name('book.offer.store');
Route::get('update/order/status/{id}', 'Frontend\OrderController@updateOrderStatus')->name('update.offer.status');
Route::post('customer/order/confirmation', 'Frontend\OrderController@customerOrderConfirmation')->name('customer.order.confirmation');

//Thankyou

Route::get('thankyou', function () {
    return view('frontend.pages.thankyou');
})->name('thankyou');

Route::get('emails', function () {
    $user = \App\Models\User::first();
    $partner = \App\Models\User::first();
    $settings = \App\Models\Setting::first();
    $offer = \App\Models\Offer::first();
    $order = \App\Models\Order::first();

    return view('frontend.pages.comparison.email', compact('user', 'partner', 'settings', 'offer', 'order'));
});

