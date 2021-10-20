<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductLineController;
use App\Http\Controllers\ProductsController;
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

Route::get('/dashboard', function () {

    $user = Auth::user();

    if (!$user->hasRole('administrator|superadministrator')) {
        return abort(403);
    }

    return view('dashboard', [
        "user" => Auth::user()
    ]);
})->middleware(['auth'])->name('dashboard');

//Custoemr route
Route::get('customers', [CustomerController::class, 'index'])->name('customers');

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeesController::class, 'index'])->name('employees');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrdersController::class, 'index'])->name('orders');
});

Route::prefix('offices')->group(function () {
    Route::get('/', [OfficesController::class, 'index'])->name('offices');
});


Route::prefix('product-lines')->group(function () {
    Route::get('/', [ProductLineController::class, 'index'])->name('product_lines');
});


require __DIR__ . '/auth.php';
