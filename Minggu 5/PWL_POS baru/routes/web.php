<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\Route;


// Praktikum 2
Route::get('/', [WelcomeController::class,'index']);
// Praktikum 3
Route::group(['prefix'=>'user'], function(){
    Route::get('/',[UserController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[UserController::class,'list']);//menampilkan data user bentuk json / datatables
    Route::get('/create',[UserController::class,'create']);// meanmpilkan bentuk form untuk tambah user
    Route::post('/',[UserController::class,'store']);//menyimpan user data baru 
    Route::get('/{id}',[UserController::class,'show']); // menampilkan detail user
    Route::get('/{id}/edit',[UserController::class,'edit']);// menampilkan halaman form edit user
    Route::put('/{id}',[UserController::class,'update']);// menyimpan perubahan data user 
    Route::delete('/{id}',[UserController::class,'destroy']);// menghapus data user 
});

//Tugas
// m_level
Route::group(['prefix'=>'level'], function(){
    Route::get('/',[LevelController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[LevelController::class,'list']);//menampilkan data level bentuk json / datatables
    Route::get('/create',[LevelController::class,'create']);// meanmpilkan bentuk form untuk tambah level
    Route::post('/',[LevelController::class,'store']);//menyimpan level data baru 
    Route::get('/{id}',[LevelController::class,'show']); // menampilkan detail level
    Route::get('/{id}/edit',[LevelController::class,'edit']);// menampilkan halaman form edit level
    Route::put('/{id}',[LevelController::class,'update']);// menyimpan perubahan data level 
    Route::delete('/{id}',[LevelController::class,'destroy']);// menghapus data level 
});

// m_kategori
Route::group(['prefix'=>'kategori'], function(){
    Route::get('/',[KategoriController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[KategoriController::class,'list']);//menampilkan data kategori bentuk json / datatables
    Route::get('/create',[KategoriController::class,'create']);// meanmpilkan bentuk form untuk tambah kategori
    Route::post('/',[KategoriController::class,'store']);//menyimpan kategori data baru 
    Route::get('/{id}',[KategoriController::class,'show']); // menampilkan detail kategori
    Route::get('/{id}/edit',[KategoriController::class,'edit']);// menampilkan halaman form edit kategori
    Route::put('/{id}',[KategoriController::class,'update']);// menyimpan perubahan data kategori
    Route::delete('/{id}',[KategoriController::class,'destroy']);// menghapus data kategori 
});