<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\AuthController;
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
    Route::get('/create_ajax',[UserController::class,'create_ajax']);// menampilkan halaman form tambah user ajax
    Route::post('/ajax',[UserController::class,'store_ajax']);// menyimpan data user baru ajax
    Route::get('/{id}',[UserController::class,'show']); // menampilkan detail user
    Route::get('/{id}/edit',[UserController::class,'edit']);// menampilkan halaman form edit user
    Route::put('/{id}',[UserController::class,'update']);// menyimpan perubahan data user
    Route::get('/{id}/edit_ajax',[UserController::class,'edit_ajax']); // menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax',[UserController::class,'update_ajax']); // menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax',[UserController::class,'confirm_ajax']); // untuk tampilan form confirm delete yser Ajax
    Route::delete('/{id}/delete_ajax',[UserController::class,'delete_ajax']); // untuk hapus data user Ajax
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']); // Menampilkan detail user menggunakan AJAX
    Route::delete('/{id}',[UserController::class,'destroy']);// menghapus data user
    Route::get('/profile', [UserController::class, 'profile_page']);
    Route::post('/update_picture', [UserController::class, 'update_picture']);
});

//Tugas
// m_level
Route::group(['prefix'=>'level'], function(){
    Route::get('/',[LevelController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[LevelController::class,'list']);//menampilkan data level bentuk json / datatables
    Route::get('/create',[LevelController::class,'create']);// meanmpilkan bentuk form untuk tambah level
    Route::post('/',[LevelController::class,'store']);//menyimpan level data baru 
    Route::get('/create_ajax',[LevelController::class,'create_ajax']);// menampilkan halaman form tambah level ajax
    Route::post('/ajax',[LevelController::class,'store_ajax']);// menyimpan data level baru ajax
    Route::get('/{id}',[LevelController::class,'show']); // menampilkan detail level
    Route::get('/{id}/edit',[LevelController::class,'edit']);// menampilkan halaman form edit level
    Route::put('/{id}',[LevelController::class,'update']);// menyimpan perubahan data level 
    Route::get('/{id}/edit_ajax',[LevelController::class,'edit_ajax']); // menampilkan halaman form edit level Ajax
    Route::put('/{id}/update_ajax',[LevelController::class,'update_ajax']); // menyimpan perubahan data level Ajax
    Route::get('/{id}/delete_ajax',[LevelController::class,'confirm_ajax']); // untuk tampilan form confirm delete yser Ajax
    Route::delete('/{id}/delete_ajax',[LevelController::class,'delete_ajax']); // untuk hapus data level Ajax
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']); // Menampilkan detail level menggunakan AJAX
    Route::delete('/{id}',[LevelController::class,'destroy']);// menghapus data level 
});

// m_kategori
Route::group(['prefix'=>'kategori'], function(){
    Route::get('/',[KategoriController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[KategoriController::class,'list']);//menampilkan data kategori bentuk json / datatables
    Route::get('/create',[KategoriController::class,'create']);// meanmpilkan bentuk form untuk tambah kategori
    Route::post('/',[KategoriController::class,'store']);//menyimpan kategori data baru 
    Route::get('/create_ajax',[KategoriController::class,'create_ajax']);// menampilkan halaman form tambah kategori ajax
    Route::post('/ajax',[KategoriController::class,'store_ajax']);// menyimpan data kategori baru ajax
    Route::get('/{id}',[KategoriController::class,'show']); // menampilkan detail kategori
    Route::get('/{id}/edit',[KategoriController::class,'edit']);// menampilkan halaman form edit kategori
    Route::put('/{id}',[KategoriController::class,'update']);// menyimpan perubahan data kategori
    Route::get('/{id}/edit_ajax',[KategoriController::class,'edit_ajax']); // menampilkan halaman form edit kategori Ajax
    Route::put('/{id}/update_ajax',[KategoriController::class,'update_ajax']); // menyimpan perubahan data kategori Ajax
    Route::get('/{id}/delete_ajax',[KategoriController::class,'confirm_ajax']); // untuk tampilan form confirm delete kategori Ajax
    Route::delete('/{id}/delete_ajax',[KategoriController::class,'delete_ajax']); // untuk hapus data kategori Ajax
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']); // Menampilkan detail kategori menggunakan AJAX
    Route::delete('/{id}',[KategoriController::class,'destroy']);// menghapus data kategori 
});

// m_supplier
Route::group(['prefix'=>'supplier'], function(){
    Route::get('/',[SupplierController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[SupplierController::class,'list']);//menampilkan data supplier bentuk json / datatables
    Route::get('/create',[SupplierController::class,'create']);// meanmpilkan bentuk form untuk tambah supplier
    Route::post('/',[SupplierController::class,'store']);//menyimpan supplier data baru 
    Route::get('/create_ajax',[SupplierController::class,'create_ajax']);// menampilkan halaman form tambah supplier ajax
    Route::post('/ajax',[SupplierController::class,'store_ajax']);// menyimpan data supplier baru ajax
    Route::get('/{id}',[SupplierController::class,'show']); // menampilkan detail supplier
    Route::get('/{id}/edit',[SupplierController::class,'edit']);// menampilkan halaman form edit supplier
    Route::put('/{id}',[SupplierController::class,'update']);// menyimpan perubahan data supplier
    Route::get('/{id}/edit_ajax',[SupplierController::class,'edit_ajax']); // menampilkan halaman form edit supplier Ajax
    Route::put('/{id}/update_ajax',[SupplierController::class,'update_ajax']); // menyimpan perubahan data supplier Ajax
    Route::get('/{id}/delete_ajax',[SupplierController::class,'confirm_ajax']); // untuk tampilan form confirm delete supplier Ajax
    Route::delete('/{id}/delete_ajax',[SupplierController::class,'delete_ajax']); // untuk hapus data supplier Ajax
    Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']); // Menampilkan detail supplier menggunakan AJAX
    Route::delete('/{id}',[SupplierController::class,'destroy']);// menghapus data supplier 
});

// m_barang
Route::group(['prefix'=>'barang'], function(){
    Route::get('/',[BarangController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[BarangController::class,'list']);//menampilkan data barang bentuk json / datatables
    Route::get('/create',[BarangController::class,'create']);// meanmpilkan bentuk form untuk tambah barang
    Route::post('/',[BarangController::class,'store']);//menyimpan barang data baru 
    Route::get('/create_ajax',[BarangController::class,'create_ajax']);// menampilkan halaman form tambah barang ajax
    Route::post('/ajax',[BarangController::class,'store_ajax']);// menyimpan data barang baru ajax
    Route::get('/{id}',[BarangController::class,'show']); // menampilkan detail barang
    Route::get('/{id}/edit',[BarangController::class,'edit']);// menampilkan halaman form edit barang
    Route::put('/{id}',[BarangController::class,'update']);// menyimpan perubahan data baramg
    Route::get('/{id}/edit_ajax',[BarangController::class,'edit_ajax']); // menampilkan halaman form edit barang Ajax
    Route::put('/{id}/update_ajax',[BarangController::class,'update_ajax']); // menyimpan perubahan data barang Ajax
    Route::get('/{id}/delete_ajax',[BarangController::class,'confirm_ajax']); // untuk tampilan form confirm delete barang Ajax
    Route::delete('/{id}/delete_ajax',[BarangController::class,'delete_ajax']); // untuk hapus data barang Ajax
    Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']); // Menampilkan detail barang menggunakan AJAX
    Route::delete('/{id}',[BarangController::class,'destroy']);// menghapus data barang
});

// t_stok
Route::group(['prefix'=>'stok'], function(){
    Route::get('/',[StokController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[StokController::class,'list']);//menampilkan data stok bentuk json / datatables
    Route::get('/create',[StokController::class,'create']);// meanmpilkan bentuk form untuk tambah stok
    Route::post('/',[StokController::class,'store']);//menyimpan stok data baru 
    Route::get('/create_ajax',[StokController::class,'create_ajax']);// menampilkan halaman form tambah stok ajax
    Route::post('/ajax',[StokController::class,'store_ajax']);// menyimpan data stok baru ajax
    Route::get('/{id}',[StokController::class,'show']); // menampilkan detail stok
    Route::get('/{id}/edit',[StokController::class,'edit']);// menampilkan halaman form edit stok
    Route::put('/{id}',[StokController::class,'update']);// menyimpan perubahan data stok
    Route::get('/{id}/edit_ajax',[StokController::class,'edit_ajax']); // menampilkan halaman form edit barang Ajax
    Route::put('/{id}/update_ajax',[StokController::class,'update_ajax']); // menyimpan perubahan data barang Ajax
    Route::get('/{id}/delete_ajax',[StokController::class,'confirm_ajax']); // untuk tampilan form confirm delete barang Ajax
    Route::delete('/{id}/delete_ajax',[StokController::class,'delete_ajax']); // untuk hapus data barang Ajax
    Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']); // Menampilkan detail barang menggunakan AJAX
    Route::delete('/{id}',[StokController::class,'destroy']);// menghapus data stok
});

// t_penjualan
Route::group(['prefix'=>'penjualan'], function(){
    Route::get('/',[PenjualanController::class,'index']);//menampilkan halaman awal
    Route::post('/list',[PenjualanController::class,'list']);//menampilkan data penjualan bentuk json / datatables
    Route::get('/create',[PenjualanController::class,'create']);// meanmpilkan bentuk form untuk tambah penjualan
    Route::post('/',[PenjualanController::class,'store']);//menyimpan penjualan data baru 
    Route::get('/create_ajax',[PenjualanController::class,'create_ajax']);// menampilkan halaman form tambah penjualan ajax
    Route::post('/ajax',[PenjualanController::class,'store_ajax']);// menyimpan data penjualan baru ajax
    Route::get('/{id}',[PenjualanController::class,'show']); // menampilkan detail penjualan
    Route::get('/{id}/edit',[PenjualanController::class,'edit']);// menampilkan halaman form edit penjualan
    Route::put('/{id}',[PenjualanController::class,'update']);// menyimpan perubahan data penjualan
    Route::get('/{id}/edit_ajax',[PenjualanController::class,'edit_ajax']); // menampilkan halaman form edit penjualan Ajax
    Route::put('/{id}/update_ajax',[PenjualanController::class,'update_ajax']); // menyimpan perubahan data penjualan Ajax
    Route::get('/{id}/delete_ajax',[PenjualanController::class,'confirm_ajax']); // untuk tampilan form confirm delete penjualan Ajax
    Route::delete('/{id}/delete_ajax',[PenjualanController::class,'delete_ajax']); // untuk hapus data penjualan Ajax
    Route::get('/{id}/show_ajax', [PenjualanController::class, 'show_ajax']); // Menampilkan detail penjualan menggunakan AJAX
    Route::delete('/{id}',[PenjualanController::class,'destroy']);// menghapus data penjualan
});

//jobsheet 7

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postRegister']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::middleware(['auth'])->group(function() { // artinya semua route di dalam group ini harus login dulu
});

// artinya semua route di dalam group ini harus punya role ADM
Route::middleware(['authorize:ADM'])->group(function () {
    Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
            Route::post('/ajax', [LevelController::class, 'store_ajax']);
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/{id}', [LevelController::class, 'show']);
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
            Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
            Route::delete('/{id}', [LevelController::class, 'destroy']);
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
            Route::get('import', [LevelController::class, 'import']); 
            Route::post('import_ajax', [LevelController::class, 'import_ajax']);
            Route::get('export_excel', [LevelController::class, 'export_excel']); 
            Route::get('export_pdf', [LevelController::class, 'export_pdf']);
        });
    });
Route::middleware(['authorize:ADM,MNG'])->group(function () {
    Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']);
            Route::post('/list', [BarangController::class, 'list']);
            Route::get('/create', [BarangController::class, 'create']);
            Route::post('/', [BarangController::class, 'store']);
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
            Route::post('/ajax', [BarangController::class, 'store_ajax']);
            Route::get('/{id}', [BarangController::class, 'show']);
            Route::get('/{id}/edit', [BarangController::class, 'edit']);
            Route::put('/{id}', [BarangController::class, 'update']);
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
            Route::delete('/{id}', [BarangController::class, 'destroy']);
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
            Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
            Route::get('import', [BarangController::class, 'import']); 
            Route::post('import_ajax', [BarangController::class, 'import_ajax']);
            Route::get('export_excel', [BarangController::class, 'export_excel']); 
            Route::get('export_pdf', [BarangController::class, 'export_pdf']); 
        });
    });
    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
            Route::get('/', [WelcomeController::class, 'index']);
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [UserController::class, 'index']);         // menampilkan halaman awal user
                Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
                Route::get('/create', [UserController::class, 'create']);    // menampilkan halaman form tambah user
                Route::post('/', [UserController::class, 'store']);        // menyimpan data user baru
                Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
                Route::post('/ajax', [UserController::class, 'store_ajax']); // Menyimpan data user baru Ajax
                Route::get('/{id}', [UserController::class, 'show']);        // menampilkan detail user
                Route::get('/{id}/edit', [UserController::class, 'edit']);    // menampilkan halaman form edit user
                Route::put('/{id}', [UserController::class, 'update']);      // menyimpan perubahan data user
                Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']); // Menampilkan detail user menggunakan AJAX
                Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
                Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
                Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
                Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
                Route::delete('/{id}', [UserController::class, 'destroy']);  // menghapus data user
                Route::get('export_excel', [UserController::class, 'export_excel']); 
                Route::get('export_pdf', [UserController::class, 'export_pdf']); 
                Route::get('/profile', [UserController::class, 'profile_page']);
                Route::post('/update_picture', [UserController::class, 'update_picture']);
            });
        });

    Route::middleware(['authorize:ADM,MNG,STF,KSR'])->group(function () {
        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index']);
            Route::post("/list", [KategoriController::class, 'list']);
            Route::get('/create', [KategoriController::class, 'create']);
            Route::post('/', [KategoriController::class, 'store']);
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
            Route::post('/ajax', [KategoriController::class, 'store_ajax']);
            Route::get('/{id}', [KategoriController::class, 'show']);
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);
            Route::put('/{id}', [KategoriController::class, 'update']);
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
            Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
            Route::delete('/{id}', [KategoriController::class, 'destroy']);
            Route::get('import', [KategoriController::class, 'import']); 
            Route::post('import_ajax', [KategoriController::class, 'import_ajax']); 
            Route::get('export_excel', [KategoriController::class, 'export_excel']); 
            Route::get('export_pdf', [KategoriController::class, 'export_pdf']); 
        });
    });


    Route::middleware(['authorize:ADM,MNG,STF,KSR'])->group(function () {
        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', [SupplierController::class, 'index']);
            Route::post('/list', [SupplierController::class, 'list']);
            Route::get('/create', [SupplierController::class, 'create']);
            Route::post('/', [SupplierController::class, 'store']);
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
            Route::post('/ajax', [SupplierController::class, 'store_ajax']);
            Route::get('/{id}', [SupplierController::class, 'show']);
            Route::get('/{id}/edit', [SupplierController::class, 'edit']);
            Route::put('/{id}', [SupplierController::class, 'update']);
            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
            Route::delete('/{id}', [SupplierController::class, 'destroy']);
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
            Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax'])->name('supplier.show_ajax');
            Route::get('import', [SupplierController::class, 'import']); 
            Route::post('import_ajax', [SupplierController::class, 'import_ajax']); 
            Route::get('export_excel', [SupplierController::class, 'export_excel']); 
            Route::get('export_pdf', [SupplierController::class, 'export_pdf']); 
        });
    });
});