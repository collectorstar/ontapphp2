<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\LopHocPhanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class,'index'])->middleware('auth');

Route::get('/admin/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('main',[MainController::class,'index'])->name('admin');
        Route::prefix('sinhvien')->group(function(){
            Route::get('list',[SinhVienController::class,'index'])->name('sinhvien');
            Route::get('getList',[SinhVienController::class,'getList']);
            Route::DELETE('delete',[SinhVienController::class,'delete']);
            Route::get('add',[SinhVienController::class,'create']);
            Route::post('add/store',[SinhVienController::class,'store']);
            Route::get('edit/{sinhvien}',[SinhVienController::class,'edit']);
            Route::post('edit/{sinhvien}',[SinhVienController::class,'postedit']);


        });
        Route::prefix('lophocphan')->group(function(){
            Route::get('list',[LopHocPhanController::class,'index'])->name('lophocphan');
            Route::get('getList',[LopHocPhanController::class,'getList']);
            Route::DELETE('delete',[LopHocPhanController::class,'delete']);
            Route::get('add',[LopHocPhanController::class,'create']);
            Route::post('add/store',[LopHocPhanController::class,'store']);
            Route::get('edit/{lophocphan}',[LopHocPhanController::class,'edit']);
            Route::post('edit/{lophocphan}',[LopHocPhanController::class,'postedit']);



        });
    });
});

