<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiemThiController;
use App\Models\User;
use Illuminate\Support\Facades\DB;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "bạn phải trên 20 tuổi";
});

Route::get('/about', function () {
    return view('about');
})->middleware('check');

Route::get('/contact',[ContactController::class, 'index'])->name('con'); //xác định một route đến 1 controller trong Laravel8

//Route category
Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');

//Route điểm thi
Route::get('/diemthi',[DiemThiController::class, 'DiemThi'])->name('search.diemthi');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
      $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');
