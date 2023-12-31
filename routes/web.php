<?php


use App\Http\Controllers\Admin\Auth\MyAccountController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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
Route::get('admin/register', [RegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
Route::post('admin/register', [RegisterController::class, 'register'])->name('backpack.auth.register');

Route::get('edit-account-info', [MyAccountController::class, 'getAccountInfoForm'])->name('backpack.account.info');
Route::post('edit-account-info',
    [MyAccountController::class, 'postAccountInfoForm'])->name('backpack.account.info.store');
Route::post('change-password',
    [MyAccountController::class, 'postChangePasswordForm'])->name('backpack.account.password');

Route::get('/', function () {
    return redirect('/admin');
});

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array)config('backpack.base.web_middleware', 'web'),
        (array)config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    Route::crud('user', 'UserCrudController');
});
