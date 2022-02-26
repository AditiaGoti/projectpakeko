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

Route::get('/', [loginc::class, 'index']);
Route::post('login', [loginc::class, 'login']);
Route::get('/logout', function () {
    return view('logout');
});

// Profile

Route::view('/profile-admin', 'admin/view-admin/profile-admin');
Route::view('/profile-member', 'member/profile-member');

Route::view('/editprofile-admin', 'admin/view-admin/editprofile-admin');
Route::view('/editprofile-member', 'member/editprofile-member');

Route::view('/changepass-admin', 'admin/view-admin/changepass-admin');
Route::view('/changepass-member', 'member/changepass-member');

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

Route::get('/formu_member', function () {
    return view('admin/formu-admin/formu_member');
});

Route::get('/formu_paket', function () {
    return view('admin/formu-admin/formu_paket');
});

// Member

Route::get('/member', function () {
    return view('member/dashboard-member');
});

//Owner



Route::get('/owner', function () {
    return view('owner/view-owner/dashboard-owner');
});

Route::get('/owalladmin', function () {
    return view('owner/table-owner/table_alladmin');
});

Route::get('/owform_admin', function () {
    return view('owner/form-owner/form_admin');
});

Route::get('/owtransaksi', function () {
    return view('owner/table-owner/table_transaksi');
});

Route::get('/owkehadiran', function () {
    return view('owner/table-owner/table_kehadiran');
});

Route::get('/owactive_member', function () {
    return view('owner/table-owner/table_activemember');
});

Route::get('/owinactive_member', function () {
    return view('owner/table-owner/table_inactivemember');
});

Route::get('/owall_member', function () {
    return view('owner/table-owner/table_allmember');
});

Route::get('/owpaket', function () {
    return view('owner/table-owner/table_paket');
});

Route::get('/owform_kehadiran', function () {
    return view('owner/form-owner/form_kehadiran');
});

Route::get('/owform_member', function () {
    return view('owner/form-owner/form_member');
});

Route::get('/owform_transaksi', function () {
    return view('owner/form-owner/form_transaksi');
});

Route::get('/owform_paket', function () {
    return view('owner/form-owner/form_paket');
});

Route::get('/owformu_admin', function () {
    return view('owner/formu-owner/formu_admin');
});

Route::get('/owformu_member', function () {
    return view('owner/formu-owner/formu_member');
});

Route::get('/owformu_paket', function () {
    return view('owner/formu-owner/formu_paket');
});
