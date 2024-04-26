<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categorie;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CarteController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class ,'index']);

Route::get('/shop/{genre?}/{categorie?}/{id?}', [FrontController::class ,'itemdetail'])->name('shop');

//Route::get('/',[FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('add-to-carte',[CarteController::class,'addproduit']);
    Route::get('carte',[FrontController::class , 'carte']);
    Route::get('destroy/{id}',[FrontController::class, 'destroy']);
    Route::get('checkout',[CheckoutController::class , 'index']);
    Route::post('place_order',[CheckoutController::class, 'addorder']);
    Route::get('my_orders',[UserController::class, 'index']);
    Route::get('view_order/{id}',[UserController::class, 'view']);
    Route::post('continue',[CheckoutController::class, 'adddata']);
    Route::get('credit-carte/{id}',[CheckoutController::class, 'creditcartedata'])->name('credit-carte');
    Route::put('end/{id}',[CheckoutController::class, 'updateorder']);
    Route::post('review',[CheckoutController::class, 'addreview']);
});

Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', [FrontendController::class,'index']);

    Route::get('categories', [CategorieController::class,'index']);
    Route::get('categories/create',[CategorieController::class,'create']);
    Route::post('categories/store',[CategorieController::class,'store']);
    Route::get('categories/edit/{id}',[CategorieController::class,'edit']);
    Route::put('categories/update/{id}',[CategorieController::class,'update']);
    Route::get('categories/destroy/{id}',[CategorieController::class,'destroy']);

    Route::get('promotions', [PromotionController::class,'index']);
    Route::get('promotions/create',[PromotionController::class,'create']);
    Route::post('promotions/store',[PromotionController::class,'store']);
    Route::get('promotions/edit/{id}',[PromotionController::class,'edit']);
    Route::put('promotions/update/{id}',[PromotionController::class,'update']);
    Route::get('promotions/destroy/{id}',[PromotionController::class,'destroy']);

    Route::get('produits', [ProduitController::class,'index']);
    Route::get('produits/create',[ProduitController::class,'create']);
    Route::post('produits/store',[ProduitController::class,'store']);
    Route::get('produits/edit/{id}',[ProduitController::class,'edit']);
    Route::put('produits/update/{id}',[ProduitController::class,'update']);
    Route::get('produits/destroy/{id}',[ProduitController::class,'destroy']);
    
    Route::get('orders',[FrontendController::class , 'orders']);
    Route::get('order_completed',[FrontendController::class , 'ordercompleted']);
    Route::get('orders/{id}',[FrontendController::class , 'orderdetail']);
    Route::put('update-order/{id}',[FrontendController::class, 'updatestatus']);

    Route::get('users',[FrontendController::class, 'users']);
    Route::get('users/{id}',[FrontendController::class, 'usersdetail']);
 });
 
