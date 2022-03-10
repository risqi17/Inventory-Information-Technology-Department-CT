<?php

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

@include_once('admin_web.php');

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

Route::prefix('starter-kit')->group(function () {
    Route::view('index', 'admin.color-version.index')->name('index');
});

Route::group(['prefix' => 'master', 'as' => 'master.','middleware' => ['auth']], function () {
    // Product
    Route::resource('product', 'Master\ProductController');
    Route::get('product_datatables', ['uses' => 'Master\ProductController@datatables', 'as' => 'product.datatables'] );

    // Department
    Route::resource('department', 'Master\DepartmentController');
    Route::get('department_datatables', ['uses' => 'Master\DepartmentController@datatables', 'as' => 'department.datatables'] );

    // Company
    Route::resource('company', 'Master\CompanyController');
    Route::get('company_datatables', ['uses' => 'Master\CompanyController@datatables', 'as' => 'company.datatables'] );

    // Category
    Route::resource('category', 'Master\CategoryController');
    Route::get('category_datatables', ['uses' => 'Master\CategoryController@datatables', 'as' => 'category.datatables'] );

    // User
    Route::resource('user', 'Master\UserController');
    Route::get('user_datatables', ['uses' => 'Master\UserController@datatables', 'as' => 'user.datatables'] );
});

Route::group(['prefix' => 'inventory', 'as' => 'inventory.','middleware' => ['auth']], function () {
    // Route::get('/home', ['uses' => 'Inventory\InventoryController@index', 'as' => 'inventory.home'] )->name('inventory.home');
    Route::resource('main', 'Inventory\InventoryController');
    Route::get('main_datatables', ['uses' => 'Inventory\InventoryController@datatables', 'as' => 'main.datatables'] );

});

Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    Route::get('/register', 'RegisterController@show')->name('register');
    Route::post('/register', 'RegisterController@register')->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', 'LoginController@show')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.perform');

});

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    Route::get('/', function () {
        return redirect()->route('index');
    })->name('/');

    Route::get('/home', function () {
        return redirect()->route('index');
    })->name('/home');
    
    Route::prefix('starter-kit')->group(function () {
        Route::view('index', 'admin.color-version.index')->name('index');
    });

});