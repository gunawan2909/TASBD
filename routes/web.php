<?php

use App\Http\Controllers\coba;


use App\Http\Controllers\admin;
use App\Http\Controllers\login;
use App\Http\Controllers\datasantri;
use App\Http\Controllers\pembayaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wificontroler;


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



Route::post('/login', [login::class, 'authenticate']);
Route::post('/logout', [login::class, 'logout']);
Route::get('/login', [login::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [login::class, 'register']);
Route::post('/register', [login::class, 'store']);

Route::get('/home', [wificontroler::class, 'status'])->middleware('auth')->name('home');
Route::post('/home/{id}', [wificontroler::class, 'delete'])->middleware('auth');
Route::get('/home/request', [wificontroler::class, 'req'])->middleware('auth');
Route::post('/home/request/{id}', [wificontroler::class, 'paket'])->middleware('auth');
Route::get('/home/report', [wificontroler::class, 'report'])->middleware('auth');
Route::get('/wifi', [wificontroler::class, 'view'])->middleware('auth');
Route::post('/wifi', [wificontroler::class, 'kouta'])->middleware('auth');

Route::get('/pembayaran', [pembayaran::class, 'request'])->middleware(['auth', 'admin']);
Route::post('/pembayaran/{id}', [pembayaran::class, 'tambah'])->middleware(['auth', 'admin']);
Route::post('/pembayaran/delete/{id}', [pembayaran::class, 'destroy'])->middleware(['auth', 'admin']);
Route::get('/pembayaran/report', [pembayaran::class, 'report'])->middleware(['auth', 'admin']);
// Route::post('/pembayaran/report', [pembayaran::class, 'cari'])->middleware(['auth', 'admin']);
Route::get('/pembayaran/gift', [pembayaran::class, 'gift'])->middleware(['auth', 'admin']);
Route::post('/gift', [pembayaran::class, 'giftupdate'])->middleware(['auth', 'admin']);


Route::get('/datasantri', [datasantri::class, 'index'])->middleware(['auth', 'admin']);
Route::post('/datasantri', [datasantri::class, 'store'])->middleware(['auth', 'admin']);
Route::get('/datasantri/tambah', [datasantri::class, 'create'])->middleware(['auth', 'admin']);
Route::get('/datasantri/edit/{nis}', [datasantri::class, 'edit'])->middleware(['auth', 'admin']);
Route::get('/datasantri/editAccount/{nis}', [datasantri::class, 'editsantri'])->middleware(['auth']);
Route::get('/datasantri/delete/{nis}', [datasantri::class, 'destroy'])->middleware(['auth', 'admin']);
Route::post('/datasantri/update/{user}', [datasantri::class, 'update'])->middleware(['auth', 'admin']);

Route::get('/admin', [admin::class, 'admin'])->middleware(['auth', 'IT']);
Route::post('/admin', [admin::class, 'store'])->middleware(['auth', 'IT']);
Route::post('/admin/delete/{nis}', [admin::class, 'delete'])->middleware(['auth', 'IT']);
Route::get('/admin/paket', [admin::class, 'paket'])->middleware(['auth', 'IT']);
Route::post('/admin/paket', [admin::class, 'storepaket'])->middleware(['auth', 'IT']);
Route::post('/admin/updatepaket', [admin::class, 'updatepaket'])->middleware(['auth', 'IT']);
Route::post('/admin/paketdelete/{id}', [admin::class, 'deletepaket'])->middleware(['auth', 'IT']);
Route::get('/admin/paket/tambah', [admin::class, 'paketadd'])->middleware(['auth', 'IT']);
Route::get('/admin/paket/edit/{id}', [admin::class, 'paketedit'])->middleware(['auth', 'IT']);
Route::get('/admin/ip', [admin::class, 'indexip'])->middleware(['auth', 'IT']);
Route::post('/admin/ip', [admin::class, 'updateip'])->middleware(['auth', 'IT']);


Route::get('/', function () {
    return redirect('/home');
});
