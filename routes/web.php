<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//////////////--------------------AdminController----------------////////////
Route::controller(AdminController::class)->group(function(){

    Route::get('admin/dashboard', 'AdminDashboard')->name('admin/dashboard');

});


////////////----------------User UserCategoryController -------------////////////
Route::controller(UserCategoryController::class)->group(function(){

    Route::get('all/usercategory', 'AllUserCategory')->name('all.usercategory');
    Route::get('add/usercategory', 'AddUserCategory')->name('add.usercategory');
    Route::post('store/usercategory', 'StoreUserCategory')->name('store.usercategory');
    Route::get('/status/{id}','Status')->name("status");
    Route::get('edit/usercategory/{id}', 'EditUserCategory')->name('edit.usercategory');
    Route::post('update/usercategory', 'UpdateUserCategory')->name('update.usercategory');
    Route::get('delete/usercategory/{id}', 'DeleteUserCategory')->name('delete.usercategory');




  

});

