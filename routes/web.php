<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
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

//Route::get('/', function () {
    //return view('welcome');
//});


Route::get('/', [App\Http\Controllers\FrontProductListController::class, 'index']);
Route::get('/index/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [App\Http\Controllers\FrontProductListController::class, 'show'])->name('product.view');
Route::get('subcategories/{id}', [App\Http\Controllers\ProductController::class, 'loadSubCategories']);
Route::get('/category/{name}', [App\Http\Controllers\FrontProductListController::class, 'allProduct'])->name('product.list');
Route::get('/addToCart/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add.cart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart.show');
Route::post('/products/{product}', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('/product/{product}', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');

Route::get('/checkout/{amount}', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
//Route::get('/checkout/{amount}', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/charge', [App\Http\Controllers\CartController::class, 'charge'])->name('cart.charge');
Route::get('/orders', [App\Http\Controllers\CartController::class, 'order'])->name('order')->middleware('auth');

Route::get('all/products', [App\Http\Controllers\FrontProductListController::class, 'moreProducts'])->name('more.product');


Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
   // Route::get('subcategories/{id}', [App\Http\Controllers\ProductController::class, 'loadSubCategories']);
    //Route::resource('user',UserController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubcategoryController::class);
    Route::resource('product',ProductController::class);

    Route::get('slider/create', [App\Http\Controllers\SliderController::class, 'create'])->name('slider.create');
    Route::post('slider', [App\Http\Controllers\SliderController::class, 'store'])->name('slider.store');

    Route::get('slider', [App\Http\Controllers\SliderController::class, 'index'])->name('slider.index');
    Route::delete('slider/{id}', [App\Http\Controllers\SliderController::class, 'destroy'])->name('slider.destroy');

    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

    Route::get('orders', [App\Http\Controllers\CartController::class, 'userOrder'])->name('order.index');
    Route::get('/orders/{userid}/{orderid}', [App\Http\Controllers\CartController::class, 'viewUserOrder'])->name('user.order');

});