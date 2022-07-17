<?php

use App\Http\Controllers\Admin\UserController as User;
use App\Http\Controllers\Admin\DashboardController as Dashboard;
use App\Http\Controllers\Admin\ShopkeeperController as Shopkeeper;
use App\Http\Controllers\Admin\SupplierController as Supplier;
use App\Http\Controllers\Admin\WarehouseController as Warehouse;
use App\Http\Controllers\Admin\CityController as City;
use App\Http\Controllers\Admin\UnitController as Unit;
use App\Http\Controllers\Admin\BrandController as Brand;
use App\Http\Controllers\Admin\CategoryController as Category;
use App\Http\Controllers\Admin\PoController as Po;
use App\Http\Controllers\Admin\SubCategoryController as SubCategory;
use App\Http\Controllers\Admin\ProductController as Product;
use App\Http\Controllers\Admin\SupplierProductController as SupplierProduct;
use App\Http\Controllers\Admin\ProfileController as Profile;

//for suppler
use App\Http\Controllers\Supplier\DashboardController as SupplierDashboard;
use App\Http\Controllers\Supplier\ProductController as SProduct;


use App\Http\Controllers\LoginController as Login;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', [Login::class, 'index']);
Route::post('login', [Login::class, 'login']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('logout', [Login::class, 'logout']);

    Route::resource('profile', Profile::class);

    Route::get('dashboard', [Dashboard::class, 'index']);

    Route::resource('user', User::class);
    Route::resource('shopkeeper', Shopkeeper::class);
    Route::resource('supplier', Supplier::class);
    Route::resource('supplier-product', SupplierProduct::class);
    Route::get('get-supplier-product/{id}', [SupplierProduct::class, 'getSupplierProduct']);
    Route::resource('warehouse', Warehouse::class);

    Route::resource('city', City::class);
    Route::resource('unit', Unit::class);
    Route::resource('brand', Brand::class);
    Route::resource('category', Category::class);
    Route::resource('sub_category', SubCategory::class);
    Route::resource('product', Product::class);

    Route::post('assign-product', [Product::class, 'assignProduct']);

    Route::resource('po', Po::class);
});


Route::group(['prefix' => 'supplier', 'middleware' => 'supplier'], function () {

    // Route::get('dashboard', [Dashboard::class, 'index']);
    Route::resource('dashboard', SupplierDashboard::class);
    Route::resource('s-product', SProduct::class);
});



Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
    return "Cache/Route is cleared";
});
