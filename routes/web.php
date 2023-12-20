<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserCategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\Inv_UnitController;

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
// Route::controller(AdminController::class)->group(function(){

//     Route::get('admin/dashboard', 'AdminDashboard')->name('admin.dashboard')->middleware('admin');

// });
///////////////-------------------AdminController------------------//////////////
Route::prefix('admin')->group(function(){

    Route::get('/login', [AdminController::class, 'Index'])->name('login_from');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');
    Route::post('/register/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');

});


////////////----------------UserCategoryController -------------////////////
Route::controller(UserCategoryController::class)->group(function(){

    Route::get('all/usercategory', 'AllUserCategory')->name('all.usercategory');
    Route::get('add/usercategory', 'AddUserCategory')->name('add.usercategory');
    Route::post('store/usercategory', 'StoreUserCategory')->name('store.usercategory');
    Route::get('user/category/status/{id}','UserCategoryStatus')->name("user.category.status");
    Route::get('edit/usercategory/{id}', 'EditUserCategory')->name('edit.usercategory');
    Route::post('update/usercategory', 'UpdateUserCategory')->name('update.usercategory');
    Route::get('delete/usercategory/{id}', 'DeleteUserCategory')->name('delete.usercategory');

});

////////////----------------UserController -------------////////////
Route::controller(UserController::class)->group(function(){

    Route::get('all/user', 'AllUser')->name('all.user');
    Route::get('add/user', 'AddUser')->name('add.user');
    Route::post('store/user', 'StoreUser')->name('store.user');
    Route::get('user/info/status/{id}','UserInfoStatus')->name("user.info.status");
    Route::get('edit/user/{id}', 'EditUser')->name('edit.user');
    Route::post('update/user', 'UpdateUser')->name('update.user');
    Route::get('delete/user/{id}', 'DeleteUser')->name('delete.user');

});

////////////----------------Inv_UnitController -------------////////////
Route::controller(Inv_UnitController::class)->group(function(){

    Route::get('all/unit', 'AllUnit')->name('all.unit');
    Route::get('add/unit', 'AddUnit')->name('add.unit');
    Route::post('store/unit', 'StoreUnit')->name('store.unit');
    Route::get('unit/status/{id}','UnitStatus')->name("unit.status");
    Route::get('edit/unit/{id}', 'EditUnit')->name('edit.unit');
    Route::post('update/unit', 'UpdateUnit')->name('update.unit');
    Route::get('delete/unit/{id}', 'DeleteUnit')->name('delete.unit');

});

