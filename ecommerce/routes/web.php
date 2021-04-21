<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;


//Get Routes
Route::get('/', [ProductController::class, 'homeProducts']);

Route::get('/product/{id}', [ProductController::class, 'showProduct']);


Route::get('/admin/login', function () {

    if (session('userId')) {

        return redirect('/');
    }

    return view('login');
});




Route::get('/checkout', [CheckoutController::class, 'show']);

Route::get('/admin', function () {

    return redirect('/admin/dashboard');
});

//Returning Views Routes
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/admin/addproduct', [DashboardController::class, 'addproduct']);
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/admin/allproducts', [ProductController::class, 'allproducts']);
Route::get('/admin/orders', [OrderController::class, 'orders']);
Route::get('/admin/promocodes', [PromocodeController::class, 'promocodes']);
Route::get('/admin/subscribers', [SubscriberController::class, 'subscribers']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'editProduct']);
Route::get('/contact', [TicketController::class, 'show']);
Route::get('/addcart/{id}', [CartController::class, 'add']);
Route::get('/admin/tickets', [TicketController::class, 'showall']);
Route::get('/admin/credentials', [AuthController::class, 'credentials']);
Route::get('/paymentcompleted', [CheckoutController::class, 'completedOrder']);
Route::get('/order/view/{id}', [OrderController::class, 'orderView']);
//User creating route
Route::get('/create', [AuthController::class, 'create']);


//Updating Routes (GET)

Route::get('/order/wait/{id}', [OrderController::class, 'waitOrder']);
Route::get('/order/complete/{id}', [OrderController::class, 'completeOrder']);
Route::get('/promocode/approve/{id}', [PromocodeController::class, 'approve']);
Route::get('/promocode/unapprove/{id}', [PromocodeController::class, 'unapprove']);

//Deleting Routes (GET)
Route::get('/admin/product/delete/{id}', [ProductController::class, 'productDelete']);
Route::get('/admin/subscriber/delete/{id}', [SubscriberController::class, 'subscriberDelete']);
Route::get('/promocode/delete/{id}', [PromocodeController::class, 'delete']);
Route::get('/admin/ticket/delete/{id}', [TicketController::class, 'delete']);
//Post Routes
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/createproduct', [ProductController::class, 'createProduct']);
Route::post('/updateproduct/{id}', [ProductController::class, 'updateProduct']);
Route::post('/subscribe', [SubscriberController::class, 'subscribe']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/generatePromoCode', [PromocodeController::class, 'generatePromoCode']);
Route::post('/checkcoupon', [CheckoutController::class, 'checkcoupon']);
Route::post('/proceed', [CheckoutController::class, 'proceed']);
Route::post('/remove/{id}', [CartController::class, 'remove']);
Route::post('/createticket', [TicketController::class, 'create']);
Route::post('/changecredentials', [AuthController::class, 'changeCredentials']);
