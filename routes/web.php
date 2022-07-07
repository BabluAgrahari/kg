<?php

use App\Http\Controllers\Admin\DashboardController as Dashboard;
use App\Http\Controllers\Admin\ShopkeeperController as Shopkeeper;
use App\Http\Controllers\Admin\SupplierController as Supplier;
use App\Http\Controllers\Admin\WarehouseController as Warehouse;
use App\Http\Controllers\Admin\CityController as City;
use App\Http\Controllers\Admin\UnitController as Unit;
use App\Http\Controllers\Admin\BrandController as Brand;

use App\Http\Controllers\LoginController as Login;
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('logout', [Login::class, 'logout']);

    Route::get('dashboard', [Dashboard::class, 'index']);

    Route::resource('shopkeeper', Shopkeeper::class);
    Route::resource('supplier', Supplier::class);
    Route::resource('warehouse', Warehouse::class);

    Route::resource('city', City::class);
    Route::resource('unit', Unit::class);
    Route::resource('brand', Brand::class);


    Route::get('/shopkeeper-details', [App\Http\Controllers\Admin\ShopkeeperController::class, 'shopkeeperDetails'])->name('shopkeeper-details');
    Route::get('/shopkeeper-details-add', [App\Http\Controllers\Admin\ShopkeeperController::class, 'shopkeeperDetailsAdd'])->name('shopkeeper-details-add');
    Route::get('/shopkeeper-details-edit/{id?}', [App\Http\Controllers\Admin\ShopkeeperController::class, 'shopkeeperDetailsEdit'])->name('shopkeeper-details-edit');
    Route::post('/shopkeeper-details-save', [App\Http\Controllers\Admin\ShopkeeperController::class, 'shopkeeperDetailsSave'])->name('shopkeeper-details-save');
    Route::get('/shopkeeper-details-delete/{id?}', [App\Http\Controllers\Admin\ShopkeeperController::class, 'shopkeeperDetailsDelete'])->name('shopkeeper-details-delete');


    Route::get('/supplier-details', [App\Http\Controllers\Admin\SupplierController::class, 'supplierDetails'])->name('supplier-details');
    Route::get('/supplier-details-add', [App\Http\Controllers\Admin\SupplierController::class, 'supplierDetailsAdd'])->name('supplier-details-add');
    Route::get('/supplier-details-edit/{id?}', [App\Http\Controllers\Admin\SupplierController::class, 'supplierDetailsEdit'])->name('supplier-details-edit');
    Route::post('/supplier-details-save', [App\Http\Controllers\Admin\SupplierController::class, 'supplierDetailsSave'])->name('supplier-details-save');
    Route::get('/supplier-details-delete/{id?}', [App\Http\Controllers\Admin\SupplierController::class, 'supplierDetailsDelete'])->name('supplier-details-delete');

    Route::get('/warehouse-details', [App\Http\Controllers\Admin\WarehouseController::class, 'warehouseDetails'])->name('warehouse-details');
    Route::get('/warehouse-details-add', [App\Http\Controllers\Admin\WarehouseController::class, 'warehouseDetailsAdd'])->name('warehouse-details-add');
    Route::get('/warehouse-details-edit/{id?}', [App\Http\Controllers\Admin\WarehouseController::class, 'warehouseDetailsEdit'])->name('warehouse-details-edit');
    Route::post('/warehouse-details-save', [App\Http\Controllers\Admin\WarehouseController::class, 'warehouseDetailsSave'])->name('warehouse-details-save');
    Route::get('/warehouse-details-delete/{id?}', [App\Http\Controllers\Admin\WarehouseController::class, 'warehouseDetailsDelete'])->name('warehouse-details-delete');

    Route::get('/state', [App\Http\Controllers\Admin\StateController::class, 'state'])->name('state');
    Route::get('/state-add', [App\Http\Controllers\Admin\StateController::class, 'stateAdd'])->name('state-add');
    Route::get('/state-edit/{id?}', [App\Http\Controllers\Admin\StateController::class, 'stateEdit'])->name('state-edit');
    Route::post('/state-save', [App\Http\Controllers\Admin\StateController::class, 'stateSave'])->name('state-save');
    Route::get('/state-status/{id?}', [App\Http\Controllers\Admin\StateController::class, 'stateStatus'])->name('state-status');

    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'category'])->name('category');
    Route::get('/category-add', [App\Http\Controllers\Admin\CategoryController::class, 'categoryAdd'])->name('category-add');
    Route::get('/category-edit/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryEdit'])->name('category-edit');
    Route::post('/category-save', [App\Http\Controllers\Admin\CategoryController::class, 'categorySave'])->name('category-save');
    Route::get('/category-status/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'categoryStatus'])->name('category-status');

    Route::get('/sub-category', [App\Http\Controllers\Admin\SubCategoryController::class, 'subCategory'])->name('sub-category');
    Route::get('/sub-category-add', [App\Http\Controllers\Admin\SubCategoryController::class, 'subCategoryAdd'])->name('sub-category-add');
    Route::get('/sub-category-edit/{id?}', [App\Http\Controllers\Admin\SubCategoryController::class, 'subCategoryEdit'])->name('sub-category-edit');
    Route::post('/sub-category-save', [App\Http\Controllers\Admin\SubCategoryController::class, 'subCategorySave'])->name('sub-category-save');
    Route::get('/sub-category-status/{id?}', [App\Http\Controllers\Admin\SubCategoryController::class, 'subCategoryStatus'])->name('sub-category-status');
});
