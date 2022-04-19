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

Route::get('/email', function () {
    return view('email');
});

// Login

Route::get('/', [loginc::class, 'index']);
Route::post('login', [loginc::class, 'login']);
Route::get('/logout', function () {
    return view('logout');
});

//Cileungsi
/// Profile

Route::view('/cileungsi/profile-admin', 'cileungsi/admin/view-admin/profile-admin');
Route::view('/cileungsi/profile-member', 'cileungsi/member/profile-member');

Route::view('/cileungsi/editprofile-admin', 'cileungsi/admin/view-admin/editprofile-admin');
Route::view('/cileungsi/editprofile-member', 'cileungsi/member/editprofile-member');

Route::view('/cileungsi/changepass-admin', 'cileungsi/admin/view-admin/changepass-admin');
Route::view('/cileungsi/changepass-member', 'cileungsi/member/changepass-member');

/// Admin

Route::get('/cileungsi/admin', function () {
    return view('cileungsi/admin/view-admin/dashboard');
});

Route::get('/cileungsi/transaksi', function () {
    return view('cileungsi/admin/table-admin/table_transaksi');
});
Route::get('/cileungsi/set-transaksi', function () {
    return view('cileungsi/admin/table-admin/table_set-transaksi');
});

Route::get('/cileungsi/kehadiran', function () {
    return view('cileungsi/admin/table-admin/table_kehadiran');
});

Route::get('/cileungsi/set-kehadiran', function () {
    return view('cileungsi/admin/table-admin/table_set-kehadiran');
});

Route::get('/cileungsi/all_member', function () {
    return view('cileungsi/admin/table-admin/table_allmember');
});

Route::get('/cileungsi/set-all_member', function () {
    return view('cileungsi/admin/table-admin/table_set-allmember');
});

Route::get('/cileungsi/paket', function () {
    return view('cileungsi/admin/table-admin/table_paket');
});

Route::get('/cileungsi/form_kehadiran', function () {
    return view('cileungsi/admin/form-admin/form_kehadiran');
});

Route::get('/cileungsi/form_member', function () {
    return view('cileungsi/admin/form-admin/form_member');
});

Route::get('/cileungsi/form_transaksi', function () {
    return view('cileungsi/admin/form-admin/form_transaksi');
});

Route::get('/cileungsi/form_paket', function () {
    return view('cileungsi/admin/form-admin/form_paket');
});

Route::get('/cileungsi/formu_member', function () {
    return view('cileungsi/admin/formu-admin/formu_member');
});

Route::get('/cileungsi/formu_paket', function () {
    return view('cileungsi/admin/formu-admin/formu_paket');
});

/// Member

Route::get('/cileungsi/member', function () {
    return view('cileungsi/member/dashboard-member');
});

///Owner



Route::get('/cileungsi/owner', function () {
    return view('cileungsi/owner/view-owner/dashboard-owner');
});

Route::get('/cileungsi/owalladmin', function () {
    return view('cileungsi/owner/table-owner/table_alladmin');
});

Route::get('/cileungsi/owform_admin', function () {
    return view('cileungsi/owner/form-owner/form_admin');
});

Route::get('/cileungsi/owtransaksi', function () {
    return view('cileungsi/owner/table-owner/table_transaksi');
});

Route::get('/cileungsi/set-owtransaksi', function () {
    return view('cileungsi/owner/table-owner/table_set-transaksi');
});

Route::get('/cileungsi/owkehadiran', function () {
    return view('cileungsi/owner/table-owner/table_kehadiran');
});
Route::get('/cileungsi/set-owkehadiran', function () {
    return view('cileungsi/owner/table-owner/table_set-kehadiran');
});


Route::get('/cileungsi/owall_member', function () {
    return view('cileungsi/owner/table-owner/table_allmember');
});

Route::get('/cileungsi/set-owall_member', function () {
    return view('cileungsi/owner/table-owner/table_set-allmember');
});

Route::get('/cileungsi/owpaket', function () {
    return view('cileungsi/owner/table-owner/table_paket');
});

Route::get('/cileungsi/owform_kehadiran', function () {
    return view('cileungsi/owner/form-owner/form_kehadiran');
});

Route::get('/cileungsi/owform_member', function () {
    return view('cileungsi/owner/form-owner/form_member');
});

Route::get('/cileungsi/owform_transaksi', function () {
    return view('cileungsi/owner/form-owner/form_transaksi');
});

Route::get('/cileungsi/owform_paket', function () {
    return view('cileungsi/owner/form-owner/form_paket');
});

Route::get('/cileungsi/owformu_admin', function () {
    return view('cileungsi/owner/formu-owner/formu_admin');
});

Route::get('/cileungsi/owformu_member', function () {
    return view('cileungsi/owner/formu-owner/formu_member');
});

Route::get('/cileungsi/owformu_paket', function () {
    return view('cileungsi/owner/formu-owner/formu_paket');
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
