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
        Route::get('index', ['uses' => 'DashboardController@index', 'as' => 'index'] );
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

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.','middleware' => ['auth']], function () {
    Route::get('home', ['uses' => 'DashboardController@index', 'as' => 'home'] );
    Route::get('qrcode', ['uses' => 'DashboardController@scan', 'as' => 'scan'] );

});


Route::group(['prefix' => 'assets', 'as' => 'assets.','middleware' => ['auth']], function () {
    // Route::get('/home', ['uses' => 'Inventory\InventoryController@index', 'as' => 'inventory.home'] )->name('inventory.home');
    Route::resource('main', 'Assets\AssetController');
    Route::get('main_datatables', ['uses' => 'Assets\AssetController@datatables', 'as' => 'main.datatables'] );
    Route::get('detail/{id}', ['uses' => 'Assets\AssetController@detail', 'as' => 'main.detail'] );
    Route::get('print/{id}', ['uses' => 'Assets\AssetController@print', 'as' => 'main.print'] );
    Route::get('multiple', ['uses' => 'Assets\AssetController@printMultiple', 'as' => 'main.multiple'] );
    Route::get('print/ba/{id}', ['uses' => 'Assets\AssetController@printBa', 'as' => 'main.print.ba'] );
    Route::get('check_in/{id}', ['uses' => 'Assets\AssetController@checkIn', 'as' => 'main.checkin'] );
    Route::post('check_in_process', ['uses' => 'Assets\AssetController@checkInProcess', 'as' => 'main.checkin.process'] );
    Route::get('check_out/{id}', ['uses' => 'Assets\AssetController@checkOut', 'as' => 'main.checkout'] );
    Route::post('check_out_process', ['uses' => 'Assets\AssetController@checkOutProcess', 'as' => 'main.checkout.process'] );
    Route::get('history/{id}', ['uses' => 'Assets\AssetController@history', 'as' => 'history'] );
    Route::get('ubah/{id}', ['uses' => 'Assets\AssetController@ubah', 'as' => 'main.ubah'] );
    Route::get('delete/{id}', ['uses' => 'Assets\AssetController@delete', 'as' => 'main.delete'] );
    Route::get('export', ['uses' => 'Assets\AssetController@export', 'as' => 'main.export'] );

    Route::get('transaction_edit/{id}', ['uses' => 'Assets\AssetController@transactionEdit', 'as' => 'main.transaction.edit'] );
    Route::post('transaction_update', ['uses' => 'Assets\AssetController@transactionUpdate', 'as' => 'main.transaction.update'] );

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
        Route::get('index', ['uses' => 'DashboardController@index', 'as' => 'index'] );
    });

});