<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\testController;
use App\Http\Controllers\userController;
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

Route::get('/', function () {
    return view('login');
});

// Route :: name -> test.route // views .blade  ==> {{ route('test.route') }}
Route::get('/test', [testController::class, 'index'])->name('test.route');

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard.index');

Route::prefix('users')->group(function () {
    Route::get('/', [userController::class, 'index'])->name('user.index');
    Route::post('/create', [userController::class, 'create'])->name('user.create');
    Route::get('/edit/{id}', [userController::class, 'show'])->name('user.show');
    Route::post('/update/{id}', [userController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}', [userController::class, 'delete'])->name('user.delete');
    // locahost/users/
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
