<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductLineController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Laratrust\Laratrust;

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
    return redirect('login');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:administrator|supteradministrator']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/stats', [DashboardController::class, 'stats']);
});

Route::group(['prefix' => 'customers', 'middleware' => ['auth', 'role:sales|administrator']], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers');
});

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeesController::class, 'index'])->name('employees');
});


Route::group(['prefix' => 'products', 'middleware' => ['auth', 'role:sales|administrator']], function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products');
});

Route::group(['prefix' => 'orders', 'middleware' => ['auth', 'role:sales|administrator|user']], function () {
    Route::get('/', [OrdersController::class, 'index'])->name('orders');
});


Route::group(['prefix' => 'payments', 'middleware' => ['auth', 'role:administrator|sales']], function () {
    Route::get('/', [PaymentsController::class, 'index'])->name('payments');
});

Route::group(['prefix' => 'offices', 'middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/', [OfficesController::class, 'index'])->name('offices');
});

Route::group(['prefix' => 'product-lines', 'middleware' => ['auth', 'role:sales|administrator']], function () {
    Route::get('/', [ProductLineController::class, 'index'])->name('product_lines');
});

Route::group(['prefix' => 'users', 'middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/', [UsersController::class, 'index'])->name('users');
    Route::get('/create', [UsersController::class, 'create'])->name('create-user');
    Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit-user');
    Route::post('/{id}/update', [UsersController::class, 'update'])->name('update-user');
    Route::post('/', [UsersController::class, 'store'])->name('create-user');
});


Route::group(['prefix' => 'roles', 'middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/', [RolesController::class, 'index'])->name('roles');
    Route::get('/create', [RolesController::class, 'create'])->name('create-role');
    Route::get('/{id}/edit', [RolesController::class, 'edit'])->name('edit-role');
    Route::post('/{id}/update', [RolesController::class, 'update'])->name('update-role');
    Route::post('/', [RolesController::class, 'store'])->name('store-role');
});


Route::group(['prefix' => 'logs', 'middleware' => ['auth', 'role:superadministrator|administrator']], function () {
    Route::get('/', [LogsController::class, 'index'])->name('logs');
});


// Route::group(['prefix' => 'permissions', 'middleware' => ['auth', 'role:administrator']], function () {
//     Route::get('/', [RolesController::class, 'index'])->name('roles');
//     Route::get('/create', [RolesController::class, 'create'])->name('create-role');
//     Route::get('/{id}/edit', [RolesController::class, 'edit'])->name('edit-role');
//     Route::post('/{id}/update', [RolesController::class, 'update'])->name('update-role');
//     Route::post('/store', [RolesController::class, 'store'])->name('store-role');
// });




require __DIR__ . '/auth.php';
