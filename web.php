<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\CRUD;
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
    return view('insert');
});
Route::post('insertD',[CRUD::class,'insertdata']);
Route::get('lodaData',([CRUD::class,'loadData']));
//admin//product
Route::view('/admin/product','admin.product');
Route::get('admin/product',([Admin::class,'Prod_Display']));

Route::post('ProdIns',([Admin::class,'Prod_Insert']));
Route::get('DispProd',([Admin::class,'Prod_Display']));

//admin/provider
Route::view('/admin/registration','admin.registration');
Route::post('/admin/ProvIns',([Admin::class,'Prov_Insert']));

Route::view('/admin/complain','admin.complain');
Route::get('admin/complain',([Admin::class,'Complain_Display']));
Route::get('admin/Allocation/{id}',([Admin::class,'Allocation']));
Route::post('admin/allocate',([Admin::class,'CompAllocation']));


