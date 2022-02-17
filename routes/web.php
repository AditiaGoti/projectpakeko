<?php

use App\Http\Controllers\loginc;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Login;

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

// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'login']);

Route::get('/login', [loginc::class, 'index']);
Route::post('/login', [loginc::class, 'login']);

// Profile

Route::view('/profile-admin', 'admin/view-admin/profile-admin');
Route::view('/profile-member', 'member/profile-member');

// Admin

Route::get('/admin', function () {
    return view('admin/view-admin/dashboard');
});

Route::get('/transaksi', function () {
    return view('admin/table-admin/table_transaksi');
});

Route::get('/kehadiran', function () {
    return view('admin/table-admin/table_kehadiran');
});

Route::get('/active_member', function () {
    return view('admin/table-admin/table_activemember');
});


Route::get('/inactive_member', function () {
    return view('admin/table-admin/table_inactivemember');
});

Route::get('/all_member', function () {
    return view('admin/table-admin/table_allmember');
});

Route::get('/paket', function () {
    return view('admin/table-admin/table_paket');
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

Route::get('/form_paket', function () {
    return view('admin/form-admin/form_paket');
});

// Member

Route::get('/member', function () {
    return view('member/dashboard-member');
});

//Owner



Route::get('/owner', function () {
    return view('owner/view-owner/dashboard-owner');
});

Route::get('/o.alladmin', function () {
    return view('owner/table-owner/table_alladmin');
});

Route::get('/o.form_admin', function () {
    return view('owner/form-owner/form_admin');
});

Route::get('/o.transaksi', function () {
    return view('owner/table-owner/table_transaksi');
});

Route::get('/o.kehadiran', function () {
    return view('owner/table-owner/table_kehadiran');
});

Route::get('/o.active_member', function () {
    return view('owner/table-owner/table_activemember');
});


Route::get('/o.inactive_member', function () {
    return view('owner/table-owner/table_inactivemember');
});

Route::get('/o.all_member', function () {
    return view('owner/table-owner/table_allmember');
});

Route::get('/o.paket', function () {
    return view('owner/table-owner/table_paket');
});

Route::get('/o.form_kehadiran', function () {
    return view('owner/form-owner/form_kehadiran');
});

Route::get('/o.form_member', function () {
    return view('owner/form-owner/form_member');
});

Route::get('/o.form_transaksi', function () {
    return view('owner/form-owner/form_transaksi');
});

Route::get('/o.form_paket', function () {
    return view('owner/form-owner/formu_paket');
});

Route::get('/datatables', function () {
    return view('datatables');
});
