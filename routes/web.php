<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersImportController;

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
    return view('welcome');
});

Route::get('/customers/index', [CustomersImportController::class, 'index'])->name('customers.index');
Route::get('/customers/import', [CustomersImportController::class, 'show'])->name('customers.show');
Route::post('/customers/import', [CustomersImportController::class, 'store'])->name('customers.store');

