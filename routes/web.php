<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Route
Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');


//Route Book
Route::get('admin/books', [BookController::class, 'index'])
    ->name('admin.books')
    ->middleware('is_admin');

Route::post('admin/books', [BookController::class, 'store'])
    ->name('admin.book.submit')
    ->middleware('is_admin');
Route::patch('admin/books/update', [BookController::class, 'update'])
    ->name('admin.book.update')
    ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataBuku/{id}', [BookController::class, 'getDataBuku']);
Route::delete('admin/books/delete', [BookController::class, 'destroy'])
    ->name('admin.book.delete')
    ->middleware('is_admin');


//Route PRINT PDF
Route::get('admin/print_books', [BookController::class, 'print_books'])
    ->name('admin.print.books')
    ->middleware('is_admin');


//Route PRINT EXCEL
Route::get('admin/books/export', [BookController::class, 'export'])
    ->name('admin.book.export')
    ->middleware('is_admin');



//Route IMPORT EXCEL
Route::post('admin/books/import', [BookController::class, 'import'])
    ->name('admin.book.import')
    ->middleware('is_admin');




//Route Categories
Route::get('admin/kategori', [App\Http\Controllers\CategoriesController::class, 'index'])
    ->name('admin.kategori')
    ->middleware('is_admin');


//ROUTE UTAMA BRANDS
Route::get('admin/merek', [App\Http\Controllers\BrandsController::class, 'index'])
    ->name('admin.merek')
    ->middleware('is_admin');

//route tambah brands
Route::post('admin/merek', [BrandsController::class, 'add_brand'])
    ->name('admin.brand.submit')
    ->middleware('is_admin');

//route edit brands
Route::patch('admin/merek/update', [BrandsController::class, 'update_brands'])
    ->name('admin.brand.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataBrands/{id}', [BrandsController::class, 'getDataBrands']);

//route delete brands
Route::delete('admin/merek/delete', [BrandsController::class, 'delete_brands'])
    ->name('admin.brand.delete')
    ->middleware('is_admin');


//Route Product
Route::get('admin/kelola_barang', [App\Http\Controllers\ProductController::class, 'index'])
    ->name('admin.barang')
    ->middleware('is_admin');
