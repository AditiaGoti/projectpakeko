<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/kehadiran', function () {
    return view('kehadiran');
});

Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/allmember', function () {
    return view('/member/allmember');
});

Route::get('/activemember', function () {
    return view('/member/activemember');
});

Route::get('/inactivemember', function () {
    return view('/member/inactivemember');
});

Route::get('/form_kehadiran', function () {
    return view('/form/form_kehadiran');
});

Route::get('/form_member', function () {
    return view('/form/form_member');
});

Route::get('/form_transaksi', function () {
    return view('/form/form_transaksi');
});

Route::get('/activemember', function () {
    return view('/member/activemember');
});
Route::get('/inactivemember', function () {
    return view('/member/inactivemember');
});
