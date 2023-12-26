<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StudentsController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HomeController
Route::get('/', [HomeController::class, 'index'])->name('index');

// PostController 
Route::get('/posts', [PostController::class, 'index']); // แสดงข้อมูลทั้งหมด
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('show'); // แสดงรายละเอียดข้อมูล
Route::get('/create', [PostController::class, 'create'])->name('create'); // ฟอร์มเพิ่มข้อมูล
Route::post('/store', [PostController::class, 'store'])->name('store'); // บันทึกข้อมูล
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('edit'); // ฟอร์มแก้ไข
Route::post('/post/update/{id}', [PostController::class, 'update'])->name('update'); // บักทึกการแกไข
Route::get('/post/destroy/{id}', [PostController::class, 'destroy'])->name('destroy'); // ลบข้อมูล

// CategoryController
Route::get('/category', [CategoryController::class, 'index']); // แสดงข้อมูลทั้งหมด
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create'); // ฟอร์มเพิ่มข้อมูล
Route::post('/categorystore', [CategoryController::class, 'store'])->name('category.store'); // บันทึกข้อมูล
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit'); // ฟอร์มแก้ไข
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update'); // บันทึกแก้ไข
Route::get('/category/detroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy'); // ลบข้อมูล

Route::get('student/all', [StudentsController::class, 'index'])->name('student');

Route::get('products', [ProductsController::class, 'index'])->name('index');
Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');

Route::get('/order/{id}', function($id) {
    $order = Order::find($id);
    return $order->rProduct()->orderBy('name', 'desc')->get();
});

Route::get('/order/product/{id}', function($id) {
    $order = Product::find($id);
    return $order->Order()->orderBy('id', 'desc')->get();
});