<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\User\UserController;

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

/**
 * Buyers
 * We don'y want to crud buyer directly.
 * -> We should do that in User, so we restrict the api route.
 */
Route::resource('buyers', BuyerController::class, ['only' => ['index', 'show']]);
/**
 * Sellers
 */
Route::resource('sellers', SellerController::class, ['only' => ['index', 'show']]);
/**
 * Products
 */
Route::resource('products', ProductController::class, ['only' => ['index', 'show']]);
/**
 * Transactions
 */
Route::resource('transactions', TransactionController::class, ['only' => ['index', 'show']]);
/**
 * Categories
 * TODO: Why don't allow create or edit?
 */
Route::resource('categories', CategoryController::class, ['except' => ['create', 'edit']]);
/**
 * Users
 */
Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);
