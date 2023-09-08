<?php
use App\Http\Controllers\BookController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


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
Auth::routes();
Route::resource('/books',BookController::class);

Route::get('/',function(){
    return view('welcome');
});

// Route::get('/show',function(){
//     return view('customerview')->name('show');
// });
// Route::resource('/site',Auth\CustomAuthController::class)->middleware('auth:user');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('admin.home')->middleware('is_admin');
 Route::get('/homepage', [App\Http\Controllers\BookController::class, 'userpage'])->name('userpage');
//  Route::post('/borrow', [App\Http\Controllers\BookController::class, 'storeborrow']);
 Route::put('/books/{id}/borrow', [App\Http\Controllers\BookController::class, 'borrow']);
 Route::put('/books/{id}/return', [App\Http\Controllers\BookController::class, 'return']);
 Route::get('/borr', [App\Http\Controllers\BookController::class, 'viewborr']);
 Route::post('/search', [App\Http\Controllers\BookController::class, 'serch']);
 Route::get('/users', [App\Http\Controllers\BookController::class, 'users'])->name('users')->middleware('is_admin');




 Route::get('/edit', [App\Http\Controllers\BookController::class, 'edituser'])->name('edituser');
 Route::put('/edit/{id}', [App\Http\Controllers\BookController::class, 'updateprofile'])->name('updateprofile');

//  Route::get('/home', [App\Http\Controllers\BookController::class, 'show'])->name('home');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('/site', [App\Http\Controllers\Auth\CustomAuthController::class, 'site']);
// Route::get('/site/login', [App\Http\Controllers\Auth\CustomAuthController::class,'userLogin'])->name('user.login');
// Route::post('/site/login', [App\Http\Controllers\Auth\CustomAuthController::class,'checkuserLogin'])->name('save.user.login');
// Route::get('/site', [App\Http\Controllers\Auth\CustomAuthController::class,'site'])->middleware('auth:user');
// Route::get('/site/login','Auth/CustomAuthController@userLogin')->name('user.login');
// Route::post('/site/login','Auth/CustomAuthController@checkuserLogin')->name('save.user.login');
// Route::get('/admin','Auth/CustomAuthController@admin')->name('admin')->middleware('auth:web');

