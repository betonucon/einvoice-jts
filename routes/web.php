<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\AngkutanController;
use App\Http\Controllers\AlatController;
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
Route::get('/cache-clear', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Cache facade value cleared</h1>';
});
Route::get('Hashmake',[MasterController::class, 'hashmake']);

Route::get('a/{personnel_no}/', 'Auth\LoginController@programaticallyEmployeeLogin')->name('login.a');
Auth::routes();
Route::get('/', function()
{
    return view('utama');
});
Route::group(['middleware'    => 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Customer',[CustomerController::class, 'index']);
    Route::get('Customer/ubah',[CustomerController::class, 'ubah']);
    Route::get('Customer/hapus',[CustomerController::class, 'hapus']);
    Route::post('Customer',[CustomerController::class, 'save']);
    Route::post('Customer/ubah',[CustomerController::class, 'update']);

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Alat',[AlatController::class, 'index']);
    Route::get('Transaksialat',[AlatController::class, 'index_alat']);
    Route::get('Alat/ubah',[AlatController::class, 'ubah']);
    Route::get('Alat/hapus',[AlatController::class, 'hapus']);
    Route::post('Alat',[AlatController::class, 'save']);
    Route::post('Alat/ubah',[AlatController::class, 'update']);

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Vendor',[VendorController::class, 'index']);
    Route::get('Vendor/ubah',[VendorController::class, 'ubah']);
    Route::get('Vendor/hapus',[VendorController::class, 'hapus']);
    Route::post('Vendor',[VendorController::class, 'save']);
    Route::post('Vendor/ubah',[VendorController::class, 'update']);

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Gudang',[GudangController::class, 'index']);
    Route::get('Transaksigudang',[GudangController::class, 'index_transaksi']);
    Route::get('Gudang/ubah',[GudangController::class, 'ubah']);
    Route::get('Gudang/hapus',[GudangController::class, 'hapus']);
    Route::post('Gudang',[GudangController::class, 'save']);
    Route::post('Gudang/ubah',[GudangController::class, 'update']);

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Tagihan',[TagihanController::class, 'index']);
    Route::get('TagihanAcc',[TagihanController::class, 'index_acc']);
    Route::get('TagihanBayar',[TagihanController::class, 'index_bayar']);
    Route::get('Tagihan/Create',[TagihanController::class, 'buat']);
    Route::get('Tagihan/Edit',[TagihanController::class, 'ubah']);
    Route::get('Tagihan/hapus',[TagihanController::class, 'hapus']);
    Route::post('Tagihan',[TagihanController::class, 'save']);
    Route::post('Tagihan/ubah',[TagihanController::class, 'update']);
    Route::post('Tagihan/Approval',[TagihanController::class, 'approval']);
    Route::post('Tagihan/Approvalbayar',[TagihanController::class, 'bayar']);

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Invoice',[InvoiceController::class, 'index']);
    Route::get('Invoice/create_sewa',[InvoiceController::class, 'create_sewa']);
    Route::get('Invoice/View',[InvoiceController::class, 'view']);
    Route::get('Invoice/lokasi_gudang',[InvoiceController::class, 'lokasi_gudang']);
    Route::get('Invoice/lokasi_gudang_view',[InvoiceController::class, 'lokasi_gudang_view']);
    Route::get('InvoiceAcc',[InvoiceController::class, 'index_acc']);
    Route::get('InvoiceBayar',[InvoiceController::class, 'index_bayar']);
    Route::get('Invoice/hapus_gudang',[InvoiceController::class, 'hapus_gudang']);
    Route::get('Invoice/Create',[InvoiceController::class, 'buat']);
    Route::get('Invoice/Cetak',[InvoiceController::class, 'cetak']);
    Route::get('Invoice/Edit',[InvoiceController::class, 'ubah']);
    Route::get('Invoice/hapus',[InvoiceController::class, 'hapus']);
    Route::post('Invoice',[InvoiceController::class, 'save']);
    Route::post('Invoice/ubah',[InvoiceController::class, 'update']);
    Route::post('Invoice/proses_gudang',[InvoiceController::class, 'proses_gudang']);
    Route::post('Invoice/Approval',[InvoiceController::class, 'approval']);
    Route::post('Invoice/Approvalbayar',[InvoiceController::class, 'bayar']);

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Angkutan',[AngkutanController::class, 'index']);
    Route::get('Angkutan/create_sewa',[AngkutanController::class, 'create_sewa']);
    Route::get('Angkutan/View',[AngkutanController::class, 'view']);
    Route::get('Angkutan/view_admin',[AngkutanController::class, 'view_admin']);
    Route::get('Angkutan/lokasi_gudang',[AngkutanController::class, 'lokasi_gudang']);
    Route::get('Angkutan/lokasi_gudang_view',[AngkutanController::class, 'lokasi_gudang_view']);
    Route::get('Angkutan/lokasi_gudang_admin_view',[AngkutanController::class, 'lokasi_gudang_admin_view']);
    Route::get('AngkutanAcc',[AngkutanController::class, 'index_acc']);
    Route::get('AngkutanBayar',[AngkutanController::class, 'index_bayar']);
    Route::get('Angkutan/hapus_gudang',[AngkutanController::class, 'hapus_gudang']);
    Route::get('Angkutan/Create',[AngkutanController::class, 'buat']);
    Route::get('Angkutan/Cetak',[AngkutanController::class, 'cetak']);
    Route::get('Angkutan/Edit',[AngkutanController::class, 'ubah']);
    Route::get('Angkutan/hapus',[AngkutanController::class, 'hapus']);
    Route::post('Angkutan',[AngkutanController::class, 'save']);
    Route::post('Angkutan/ubah',[AngkutanController::class, 'update']);
    Route::post('Angkutan/proses_gudang',[AngkutanController::class, 'proses_gudang']);
    Route::post('Angkutan/proses_angkutan',[AngkutanController::class, 'proses_angkutan']);
    Route::post('Angkutan/Approval',[AngkutanController::class, 'approval']);
    Route::post('Angkutan/Approvalbayar',[AngkutanController::class, 'bayar']);

});

