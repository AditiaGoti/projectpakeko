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

// // // Login Metland

Route::get('/Metland', [loginc::class, 'index']);
Route::post('loginc', [loginc::class, 'loginmet']);
Route::get('/logoutc', function () {
    return view('/metland/logoutc');
});

// Login Ragunan

Route::get('/Ragunan', [loginr::class, 'index']);
Route::post('loginr', [loginr::class, 'loginrag']);
Route::get('/logoutr', function () {
    return view('/ragunan/logoutr');
});

//Metland
/// Profile

Route::view('/Metland/profile-admin', 'Metland/admin/view-admin/profile-admin');
Route::view('/Metland/profile-member', 'Metland/member/profile-member');

Route::view('/Metland/editprofile-admin', 'Metland/admin/view-admin/editprofile-admin');
Route::view('/Metland/editprofile-member', 'Metland/member/editprofile-member');

Route::view('/Metland/changepass-admin', 'Metland/admin/view-admin/changepass-admin');
Route::view('/Metland/changepass-member', 'Metland/member/changepass-member');

/// Admin

Route::get('/Metland/admin', function () {
    return view('Metland/admin/view-admin/dashboard');
});

Route::get('/Metland/transaksi', function () {
    return view('Metland/admin/table-admin/table_transaksi');
});
Route::get('/Metland/set-transaksi', function () {
    return view('Metland/admin/table-admin/table_set-transaksi');
});

Route::get('/Metland/kehadiran', function () {
    return view('Metland/admin/table-admin/table_kehadiran');
});

Route::get('/Metland/set-kehadiran', function () {
    return view('Metland/admin/table-admin/table_set-kehadiran');
});

Route::get('/Metland/all_member', function () {
    return view('Metland/admin/table-admin/table_allmember');
});

Route::get('/Metland/set-all_member', function () {
    return view('Metland/admin/table-admin/table_set-allmember');
});

Route::get('/Metland/paket', function () {
    return view('Metland/admin/table-admin/table_paket');
});

Route::get('/Metland/form_kehadiran', function () {
    return view('Metland/admin/form-admin/form_kehadiran');
});

Route::get('/Metland/form_member', function () {
    return view('Metland/admin/form-admin/form_member');
});

Route::get('/Metland/form_transaksi', function () {
    return view('Metland/admin/form-admin/form_transaksi');
});

Route::get('/Metland/form_paket', function () {
    return view('Metland/admin/form-admin/form_paket');
});

Route::get('/Metland/formu_member', function () {
    return view('Metland/admin/formu-admin/formu_member');
});

Route::get('/Metland/formu_paket', function () {
    return view('Metland/admin/formu-admin/formu_paket');
});

/// Member

Route::get('/Metland/member', function () {
    return view('Metland/member/dashboard-member');
});

///Owner



Route::get('/Metland/owner', function () {
    return view('Metland/owner/view-owner/dashboard-owner');
});

Route::get('/Metland/owalladmin', function () {
    return view('Metland/owner/table-owner/table_alladmin');
});

Route::get('/Metland/owform_admin', function () {
    return view('Metland/owner/form-owner/form_admin');
});

Route::get('/Metland/owtransaksi', function () {
    return view('Metland/owner/table-owner/table_transaksi');
});

Route::get('/Metland/set-owtransaksi', function () {
    return view('Metland/owner/table-owner/table_set-transaksi');
});

Route::get('/Metland/owkehadiran', function () {
    return view('Metland/owner/table-owner/table_kehadiran');
});
Route::get('/Metland/set-owkehadiran', function () {
    return view('Metland/owner/table-owner/table_set-kehadiran');
});


Route::get('/Metland/owall_member', function () {
    return view('Metland/owner/table-owner/table_allmember');
});

Route::get('/Metland/set-owall_member', function () {
    return view('Metland/owner/table-owner/table_set-allmember');
});

Route::get('/Metland/owpaket', function () {
    return view('Metland/owner/table-owner/table_paket');
});

Route::get('/Metland/owform_kehadiran', function () {
    return view('Metland/owner/form-owner/form_kehadiran');
});

Route::get('/Metland/owform_member', function () {
    return view('Metland/owner/form-owner/form_member');
});

Route::get('/Metland/owform_transaksi', function () {
    return view('Metland/owner/form-owner/form_transaksi');
});

Route::get('/Metland/owform_paket', function () {
    return view('Metland/owner/form-owner/form_paket');
});

Route::get('/Metland/owformu_admin', function () {
    return view('Metland/owner/formu-owner/formu_admin');
});

Route::get('/Metland/owformu_member', function () {
    return view('Metland/owner/formu-owner/formu_member');
});

Route::get('/Metland/owformu_paket', function () {
    return view('Metland/owner/formu-owner/formu_paket');
});


//Ragunan
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
