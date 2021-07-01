<?php

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


// Route::get('/', 'User\Home@index');

// //  Admin Route

Route::get('/', 'Admin\Dashboard@index');
Route::get('/login', 'Admin\Login@index');
Route::get('/logout', 'Admin\Login@logout');
Route::post('/login', 'Admin\Login@postLogin');
Route::get('/dashboard', 'Admin\Dashboard@dashboard');
Route::get('/home', 'Admin\Dashboard@home');
Route::get('/profile', 'Admin\Dashboard@profile');
Route::get('/ajuan', 'Admin\Dashboard@ajuan');
Route::get('/batal', 'Admin\Dashboard@batal');
Route::get('/rate', 'Admin\Dashboard@rate');
Route::get('/inquiry', 'Admin\Dashboard@inquiry');
Route::get('/batal', 'Admin\Dashboard@batal');
Route::get('/validasi', 'Admin\Dashboard@validasi');
Route::get('/verifikasi', 'Admin\Dashboard@verifikasi');
Route::get('/reimbursment', 'Admin\Dashboard@reimbursment');
Route::get('/batal', 'Admin\Dashboard@batal');
Route::get('/cabang', 'Admin\Dashboard@cabang');
Route::get('/mitra', 'Admin\Dashboard@mitra');
Route::get('/user', 'Admin\Dashboard@user');
Route::get('/klien', 'Admin\Dashboard@klien');
Route::get('/tc', 'Admin\Dashboard@tc');
Route::get('/tarif', 'Admin\Dashboard@tarif');
Route::get('/medical', 'Admin\Dashboard@medical');
Route::get('/bayar', 'Admin\Dashboard@bayar');
Route::get('/rollback', 'Admin\Dashboard@rollback');
Route::get('/notif', 'Admin\Dashboard@notif');
Route::get('/revisi', 'Admin\Dashboard@revisi');
Route::get('/billing', 'Admin\Dashboard@billing');
Route::get('/asuransi', 'Admin\Dashboard@asuransi');
Route::get('/klaim', 'Admin\Dashboard@klaim');
Route::get('/bordero', 'Admin\Dashboard@bordero');
Route::get('/logdet/{id}', 'Admin\Dashboard@logdet');
Route::get('/doc/{id}', 'Admin\Dashboard@doc');


Route::get('/ajuandetail/{regid}', 'Admin\Dashboard@ajuandetail');
Route::get('/ajuanedit/{regid}', 'Admin\Dashboard@ajuanedit');
Route::get('/ajuanadd', 'Admin\Dashboard@ajuanadd');
Route::get('/ajuan/delete/{id}', 'Admin\Dashboard@ajuan_delete');
Route::post('/ajuan/add', 'Admin\Dashboard@ajuan_add');
Route::post('/ajuan/edit', 'Admin\Dashboard@ajuan_edit');


Route::get('/tarifproduk/{code}', 'Admin\Dashboard@tarifproduk');
Route::get('/tarifdetail/{code}', 'Admin\Dashboard@tarifdetail');
Route::get('/mitradetail/{id}', 'Admin\Dashboard@mitradetail');
Route::get('/userdetail/{id}', 'Admin\Dashboard@userdetail');
Route::get('/tcdetail/{id}', 'Admin\Dashboard@tcdetail');
Route::get('/medicaldetail/{id}', 'Admin\Dashboard@medicaldetail');
Route::get('/asuransidetail/{id}', 'Admin\Dashboard@asuransidetail');
Route::get('/verifikasidetail/{regid}', 'Admin\Dashboard@verifikasidetail');
Route::get('/cabangdetail/{regid}', 'Admin\Dashboard@cabangdetail');
Route::get('/klaimdetail/{regid}', 'Admin\Dashboard@klaimdetail');
Route::get('/validasidetail/{regid}', 'Admin\Dashboard@validasidetail');
Route::get('/inquirydetail/{regid}', 'Admin\Dashboard@inquirydetail');
Route::get('/inquiry/cari', 'Admin\Dashboard@cari');
Route::get('/inquiryfind', 'Admin\Dashboard@inquiryfind');

 
// Route::post('/donation/store', 'User\Checkout@submitPayment')->name('donation.store');
// Route::post('/notification/handler', 'User\Checkout@notificationHandler')->name('notification.handler');
