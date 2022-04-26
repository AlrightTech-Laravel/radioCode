<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InstantCodeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RadioCodeOrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ChooseController;
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
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('manufacturer')->name('manufacturer.')->group(function () {
        Route::get('/', [ManufacturerController::class, 'index'])->name('index');
        Route::get('/create', [ManufacturerController::class, 'create'])->name('create');
        Route::post('/store', [ManufacturerController::class, 'store'])->name('store');
        Route::get('/{manufacturer}/edit', [ManufacturerController::class, 'edit'])->name('edit');
        Route::put('/{manufacturer}/update', [ManufacturerController::class, 'update'])->name('update');
        Route::delete('/{manufacturer}/destroy', [ManufacturerController::class, 'destroy'])->name('destroy');
        // -----------------Brands CRUD
        Route::get('/brands', [ManufacturerController::class, 'manufacturerBrands'])->name('ManufacturerBrands');
        Route::post('/brand/create', [ManufacturerController::class, 'manufacturerBrandCreate'])->name('ManufacturerBrandsCreate');
        Route::get('/brand/edit/{id}', [ManufacturerController::class, 'manufacturerBrandEdit'])->name('ManufacturerBrandEdit');
        Route::post('/brand/update/{id}', [ManufacturerController::class, 'manufacturerBrandUpdate'])->name('ManufacturerBrandUpdate');
        Route::delete('/brand/{brand}/delete', [ManufacturerController::class, 'manufacturerBrandDelete'])->name('ManufacturerBrandsDelete');
        // -----------------Serials CRUD
        Route::get('{manufacturer_id}/serials', [ManufacturerController::class, 'manufacturerSerials'])->name('ManufacturerSerials');
        Route::post('serial/create', [ManufacturerController::class, 'manufacturerSerialCreate'])->name('ManufacturerSerialCreate');
        Route::delete('{serial_id}/serial/delete', [ManufacturerController::class, 'manufacturerSerialDelete'])->name('ManufacturerSerialDelete');
    });

    Route::prefix('instant-code')->name('instant-code.')->group(function () {
        Route::get('/', [InstantCodeController::class, 'index'])->name('index');
        Route::get('/{target}/show', [InstantCodeController::class, 'show'])->name('show');
        Route::get('/create', [InstantCodeController::class, 'create'])->name('create');
        Route::post('/store', [InstantCodeController::class, 'store'])->name('store');
        Route::delete('/{id}/destroy', [InstantCodeController::class, 'destroy'])->name('destroy');
        Route::get('/create/new-radio/serial', [InstantCodeController::class, 'createNewRadioSerial'])->name('CreateNewRadioSerial');
        Route::post('/store/new-radio/serial', [InstantCodeController::class, 'storeNewRadioSerial'])->name('StoreNewRadioSerial');
        Route::get('/upload/new-radio/serial', [InstantCodeController::class, 'uploadNewRadioSerial'])->name('UploadNewRadioSerial');
        Route::post('/upload/store/new-radio/serial', [InstantCodeController::class, 'uploadStoreNewRadioSerial'])->name('UploadStoreNewRadioSerial');
    });

    Route::prefix('faq')->name('faq.')->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('/create', [FaqController::class, 'create'])->name('create');
        Route::post('/store', [FaqController::class, 'store'])->name('store');
        Route::delete('/{faq}/destroy', [FaqController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('choose')->name('choose.')->group(function () {
        Route::get('/', [ChooseController::class, 'index'])->name('index');
        Route::get('/create', [ChooseController::class, 'create'])->name('create');
        Route::post('/store', [ChooseController::class, 'store'])->name('store');
        Route::delete('/{choose}/destroy', [ChooseController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('review')->name('review.')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('index');
        Route::get('/create', [ReviewController::class, 'create'])->name('create');
        Route::get('/approved/{id}', [ReviewController::class, 'approved'])->name('approved');
        Route::post('/store', [ReviewController::class, 'store'])->name('store');
        Route::delete('/{review}/destroy', [ReviewController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/pending', [OrderController::class, 'pending'])->name('pending');
        Route::patch('/{order}/send-code', [OrderController::class, 'send_code'])->name('send_code');
        Route::delete('/{order}/destroy', [OrderController::class, 'destroy'])->name('destroy');
    });
}); 

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/ford-radio-codes', [WebsiteController::class, 'fordRadioCodes'])->name('fordRadioCodes');
Route::get('/get-radio-codes', [WebsiteController::class, 'brandsList'])->name('brandsList');
Route::get('/manufacturers', [WebsiteController::class, 'manufacturers'])->name('manufacturers');
// Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('ContactUs');
Route::get('/faqs', [WebsiteController::class, 'faqs'])->name('FAQS');
Route::post('/contact', [WebsiteController::class, 'post_contact'])->name('post-contact');
Route::post('/create-order', [WebsiteController::class, 'create_order'])->name('create_order');
Route::post('/create-checkout-session', [WebsiteController::class, 'create_checkout_session'])->name('create_checkout_session');
Route::get('stripe/payment/success', [WebsiteController::class, 'stripe_success'])->name('stripe_success');
Route::get('stripe/payment/cancel', [WebsiteController::class, 'stripe_cancel'])->name('stripe_cancel');
Route::post('submit/review', [WebsiteController::class, 'submitReview'])->name('SubmitReview');

Route::name('radio-code-order.')->group(function () {
    Route::any('get-radio-code/{manufacturer:slug}/view', [RadioCodeOrderController::class, 'viewManufacturer'])->name('ViewManufacturerDetails');
    Route::get('get-radio-code/{brand:name}', [RadioCodeOrderController::class, 'show'])->name('show');
    Route::get('get-radio-code/popular/{manufacturer:slug}', [RadioCodeOrderController::class, 'showPopular'])->name('showPopular');
    Route::get('get-radio-code/{manufacturer:title}/place-order', [RadioCodeOrderController::class, 'place_order'])->name('place-order');
    Route::post('get-radio-code/get-serial-info', [RadioCodeOrderController::class, 'getSerialInfo'])->name('GetSerialInfo');
    Route::post('get-radio-code/get-order-direct', [RadioCodeOrderController::class, 'getOrderDirect'])->name('GetOrderDirect');
    Route::post('get-radio-code/{manufacturer:slug}/store-order', [RadioCodeOrderController::class, 'store_order'])->name('store-order');
    Route::get('order/{order}', [RadioCodeOrderController::class, 'order_submitted'])->name('order-submitted');
    Route::get('manufacturer/{id}', [RadioCodeOrderController::class, 'get_required_fields'])->name('get_required_fields');
    Route::post('contact-information', [RadioCodeOrderController::class, 'getContactInfo'])->name('getContactInfo');
    // Route::get('get-radio-code/{manufacturer:slug}', [RadioCodeOrderController::class, 'show'])->name('show');
    // Route::get('get-radio-code/{manufacturer:slug}/place-order', [RadioCodeOrderController::class, 'place_order'])->name('place-order');
    // Route::post('get-radio-code/{manufacturer:slug}/store-order', [RadioCodeOrderController::class, 'store_order'])->name('store-order');
});

Route::get('/demo', function(){
    echo "Hello World";
});