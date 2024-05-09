<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Frontend\WebpagerController;
use App\Http\Controllers\OrderController;
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
//website routes(frontend)

Route::get('/', [WebpagerController::class, 'webpage'])->name('home');
Route::get('/about-us', [WebpagerController::class, 'aboutus'])->name('aboutus');
Route::get('/menu', [WebpagerController::class, 'menu'])->name('all.menu');
Route::get('/contact', [WebpagerController::class, 'contact'])->name('contact');


Route::get('/customer', [WebpagerController::class, 'formreg'])->name('reg');
Route::post('/customer/done', [WebpagerController::class, 'reg'])->name('customer.done');

Route::get('/customer/login', [WebpagerController::class, 'login'])->name('customer.login');
Route::post('/customer/success', [WebpagerController::class, 'loginsuccess'])->name('customer.success');


Route::get('/customer/logout', [WebpagerController::class, 'logoutsuccess'])->name('logout.success');









//admin pannel routes

Route::group(['prefix' => 'admin'], function () {


    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/do/login', [AdminController::class, 'doLogin'])->name('do.login');
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/sign/out', [AdminController::class, 'signout'])->name('sign.out');
       //dashboard

        Route::get('/', [AdminController::class, 'admin'])->name('dashboard');

        //category
        Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/category/form', [CategoryController::class, 'form'])->name('category.form');
        Route::post('/category/form', [CategoryController::class, 'store'])->name('category.store');

        //update,view,delete for category
        Route::get('/category/delete/{id}', [CategoryController::class, 'categorydelete'])->name('category.delete');
        Route::get('/category/edit/{id}', [CategoryController::class, 'categoryeditview'])->name('category.editview');
        Route::put('/category/edit/update/{id}', [CategoryController::class, 'categoryupdate'])->name('category.edit.update');
        Route::get('/category/view/{id}', [CategoryController::class, 'categoryview'])->name('category.view');

        //menu
        Route::get('/menu/list', [MenuController::class, 'list'])->name('menu.list');
        Route::get('/menu/form', [MenuController::class, 'form'])->name('menu.form');
        Route::post('/menu/form', [MenuController::class, 'store'])->name('menu.store');

        //customer
        Route::get('/customer/list', [CustomerController::class, 'list'])->name('customer.list');
        Route::get('/customer/form', [CustomerController::class, 'form'])->name('customer.form');
        Route::post('/customer/form', [CustomerController::class, 'store'])->name('customer.store');


        //orders
        Route::get('/order/list', [OrderController::class, 'orderstore'])->name('order.list');


        

        
      
    });
});
