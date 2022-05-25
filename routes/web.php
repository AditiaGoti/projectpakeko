<?php

use App\Http\Controllers\loginc;
use App\Http\Controllers\loginr;
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


Route::get('/email', function () {
    return view('email');
});

Route::get('/', function () {
    return view('landing');
});

// // // Login metland

Route::get('/metland', [loginc::class, 'index']);
Route::post('loginc', [loginc::class, 'loginmet']);
Route::get('/logoutc', function () {
    return view('/metland/logoutc');
});

// Login ragunan

Route::get('/ragunan', [loginr::class, 'index']);
Route::post('loginr', [loginr::class, 'loginrag']);
Route::get('/logoutr', function () {
    return view('/ragunan/logoutr');
});

//metland
/// Profile

Route::view('/metland/profile-admin', 'metland/admin/view-admin/profile-admin');
Route::view('/metland/profile-member', 'metland/member/profile-member');

Route::view('/metland/editprofile-admin', 'metland/admin/view-admin/editprofile-admin');
Route::view('/metland/editprofile-member', 'metland/member/editprofile-member');

Route::view('/metland/changepass-admin', 'metland/admin/view-admin/changepass-admin');
Route::view('/metland/changepass-member', 'metland/member/changepass-member');

/// Admin

Route::get('/metland/admin', function () {
    return view('metland/admin/view-admin/dashboard');
});

Route::get('/metland/transaksi', function () {
    return view('metland/admin/table-admin/table_transaksi');
});
Route::get('/metland/set-transaksi', function () {
    return view('metland/admin/table-admin/table_set-transaksi');
});

Route::get('/metland/kehadiran', function () {
    return view('metland/admin/table-admin/table_kehadiran');
});

Route::get('/metland/set-kehadiran', function () {
    return view('metland/admin/table-admin/table_set-kehadiran');
});

Route::get('/metland/all_member', function () {
    return view('metland/admin/table-admin/table_allmember');
});

Route::get('/metland/set-all_member', function () {
    return view('metland/admin/table-admin/table_set-allmember');
});

Route::get('/metland/paket', function () {
    return view('metland/admin/table-admin/table_paket');
});

Route::get('/metland/form_kehadiran', function () {
    return view('metland/admin/form-admin/form_kehadiran');
});

Route::get('/metland/form_member', function () {
    return view('metland/admin/form-admin/form_member');
});

Route::get('/metland/form_transaksi', function () {
    return view('metland/admin/form-admin/form_transaksi');
});

Route::get('/metland/form_paket', function () {
    return view('metland/admin/form-admin/form_paket');
});

Route::get('/metland/formu_member', function () {
    return view('metland/admin/formu-admin/formu_member');
});

Route::get('/metland/formu_paket', function () {
    return view('metland/admin/formu-admin/formu_paket');
});

/// Member

Route::get('/metland/member', function () {
    return view('metland/member/dashboard-member');
});

///Owner



Route::get('/metland/owner', function () {
    return view('metland/owner/view-owner/dashboard-owner');
});

Route::get('/metland/owalladmin', function () {
    return view('metland/owner/table-owner/table_alladmin');
});

Route::get('/metland/owform_admin', function () {
    return view('metland/owner/form-owner/form_admin');
});

Route::get('/metland/owtransaksi', function () {
    return view('metland/owner/table-owner/table_transaksi');
});

Route::get('/metland/set-owtransaksi', function () {
    return view('metland/owner/table-owner/table_set-transaksi');
});

Route::get('/metland/owkehadiran', function () {
    return view('metland/owner/table-owner/table_kehadiran');
});
Route::get('/metland/set-owkehadiran', function () {
    return view('metland/owner/table-owner/table_set-kehadiran');
});


Route::get('/metland/owall_member', function () {
    return view('metland/owner/table-owner/table_allmember');
});

Route::get('/metland/set-owall_member', function () {
    return view('metland/owner/table-owner/table_set-allmember');
});

Route::get('/metland/owpaket', function () {
    return view('metland/owner/table-owner/table_paket');
});

Route::get('/metland/owform_kehadiran', function () {
    return view('metland/owner/form-owner/form_kehadiran');
});

Route::get('/metland/owform_member', function () {
    return view('metland/owner/form-owner/form_member');
});

Route::get('/metland/owform_transaksi', function () {
    return view('metland/owner/form-owner/form_transaksi');
});

Route::get('/metland/owform_paket', function () {
    return view('metland/owner/form-owner/form_paket');
});

Route::get('/metland/owformu_admin', function () {
    return view('metland/owner/formu-owner/formu_admin');
});

Route::get('/metland/owformu_member', function () {
    return view('metland/owner/formu-owner/formu_member');
});

Route::get('/metland/owformu_paket', function () {
    return view('metland/owner/formu-owner/formu_paket');
});


//ragunan
/// Profile

Route::view('/ragunan/profile-admin', 'ragunan/admin/view-admin/profile-admin');
Route::view('/ragunan/profile-member', 'ragunan/member/profile-member');

Route::view('/ragunan/editprofile-admin', 'ragunan/admin/view-admin/editprofile-admin');
Route::view('/ragunan/editprofile-member', 'ragunan/member/editprofile-member');

Route::view('/ragunan/changepass-admin', 'ragunan/admin/view-admin/changepass-admin');
Route::view('/ragunan/changepass-member', 'ragunan/member/changepass-member');

/// Admin

Route::get('/ragunan/admin', function () {
    return view('ragunan/admin/view-admin/dashboard');
});

Route::get('/ragunan/transaksi', function () {
    return view('ragunan/admin/table-admin/table_transaksi');
});
Route::get('/ragunan/set-transaksi', function () {
    return view('ragunan/admin/table-admin/table_set-transaksi');
});

Route::get('/ragunan/kehadiran', function () {
    return view('ragunan/admin/table-admin/table_kehadiran');
});

Route::get('/ragunan/set-kehadiran', function () {
    return view('ragunan/admin/table-admin/table_set-kehadiran');
});

Route::get('/ragunan/all_member', function () {
    return view('ragunan/admin/table-admin/table_allmember');
});

Route::get('/ragunan/set-all_member', function () {
    return view('ragunan/admin/table-admin/table_set-allmember');
});

Route::get('/ragunan/paket', function () {
    return view('ragunan/admin/table-admin/table_paket');
});

Route::get('/ragunan/form_kehadiran', function () {
    return view('ragunan/admin/form-admin/form_kehadiran');
});

Route::get('/ragunan/form_member', function () {
    return view('ragunan/admin/form-admin/form_member');
});

Route::get('/ragunan/form_transaksi', function () {
    return view('ragunan/admin/form-admin/form_transaksi');
});

Route::get('/ragunan/form_paket', function () {
    return view('ragunan/admin/form-admin/form_paket');
});

Route::get('/ragunan/formu_member', function () {
    return view('ragunan/admin/formu-admin/formu_member');
});

Route::get('/ragunan/formu_paket', function () {
    return view('ragunan/admin/formu-admin/formu_paket');
});

/// Member

Route::get('/ragunan/member', function () {
    return view('ragunan/member/dashboard-member');
});

///Owner



Route::get('/ragunan/owner', function () {
    return view('ragunan/owner/view-owner/dashboard-owner');
});

Route::get('/ragunan/owalladmin', function () {
    return view('ragunan/owner/table-owner/table_alladmin');
});

Route::get('/ragunan/owform_admin', function () {
    return view('ragunan/owner/form-owner/form_admin');
});

Route::get('/ragunan/owtransaksi', function () {
    return view('ragunan/owner/table-owner/table_transaksi');
});

Route::get('/ragunan/set-owtransaksi', function () {
    return view('ragunan/owner/table-owner/table_set-transaksi');
});

Route::get('/ragunan/owkehadiran', function () {
    return view('ragunan/owner/table-owner/table_kehadiran');
});
Route::get('/ragunan/set-owkehadiran', function () {
    return view('ragunan/owner/table-owner/table_set-kehadiran');
});


Route::get('/ragunan/owall_member', function () {
    return view('ragunan/owner/table-owner/table_allmember');
});

Route::get('/ragunan/set-owall_member', function () {
    return view('ragunan/owner/table-owner/table_set-allmember');
});

Route::get('/ragunan/owpaket', function () {
    return view('ragunan/owner/table-owner/table_paket');
});

Route::get('/ragunan/owform_kehadiran', function () {
    return view('ragunan/owner/form-owner/form_kehadiran');
});

Route::get('/ragunan/owform_member', function () {
    return view('ragunan/owner/form-owner/form_member');
});

Route::get('/ragunan/owform_transaksi', function () {
    return view('ragunan/owner/form-owner/form_transaksi');
});

Route::get('/ragunan/owform_paket', function () {
    return view('ragunan/owner/form-owner/form_paket');
});

Route::get('/ragunan/owformu_admin', function () {
    return view('ragunan/owner/formu-owner/formu_admin');
});

Route::get('/ragunan/owformu_member', function () {
    return view('ragunan/owner/formu-owner/formu_member');
});

Route::get('/ragunan/owformu_paket', function () {
    return view('ragunan/owner/formu-owner/formu_paket');
});
