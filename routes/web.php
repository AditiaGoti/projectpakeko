<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\LoginController;

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

// Login

Route::view('/login', 'login');
// Route::post('/login', [LoginController::class, 'login']);
// Admin

Route::get('/', function () {
    return view('admin/view-admin/dashboard');
});


Route::get('/transaksi', function () {
    return view('admin/table-admin/transaksi');
});

Route::get('/kehadiran', function () {
    return view('admin/table-admin/kehadiran');
});

Route::get('/active_member', function () {
    return view('admin/table-admin/activemember');
});

Route::get('/all_member', function () {
    return view('admin/table-admin/table_allmember');
});

Route::get('/inactive_member', function () {
    return view('admin/table-admin/inactivemember');
});

Route::get('/form_kehadiran', function () {
    return view('admin/form-admin/form_kehadiran');
});

Route::get('/form_member', function () {
    return view('admin/form-admin/form_member');
});

Route::get('/form_transaksi', function () {
    return view('admin/form-admin/form_transaksi');
});

Route::get('/form_transaksi', function () {
    return view('admin/form-admin/form_paket');
});

// Member

Route::get('/dashboard-member', function () {
    return view('member/dashboard-member');
});

//Owner

Route::get('/form_admin', function () {
    return view('owner/form-owner/form_admin');
});
