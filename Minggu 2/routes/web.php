<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController;

// mengimpor kelas ItemController dari namespace, kita bisa menggunakan ItemController dalam file routing Laravel

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

Route::resource('items', ItemController::class);
// Route::resource metode yang secara otomatis berdasarkan metode yang ada di ItemController

// Route Hello
Route::get('/hello', [WelcomeController::class,'hello']);

// Route World
Route::get('/world', function () {
        return 'World';
});

// Route '/
// Route::get('/', [PageController::class,'index']);

// Route about
// Route::get('/about', [PageController::class, 'about']);


// Route username
Route::get('/user/{name}', function ($name) {
        return 'Nama saya '.$name;
  });

// Route dengan 1 parameter lebih
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
        return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

// Route Halaman Artikel
// Route::get('/articles/{id}',[PageController::class, 'articles']);

// Route User
Route::get('/user/{name?}', function ($name="John") {
        return 'Nama saya  '.$name;
  });


// Route dengan Single Action Controller
// Route '/
// Route::get('/', [HomeController::class,'index']);
// Route about
Route::get('/about', [AboutController::class, 'about']);
// Route Halaman Artikel
Route::get('/articles/{id}',[ArticleController::class, 'articles']);

// Resource Controller
Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);


// View
// Route '/
// Route::get('/greeting', function () {
//         return view('blog.hello', ['name' => 'Andi']);});

Route::get('/greeting', [WelcomeController::class, 'greeting']);
        