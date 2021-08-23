<?php

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

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\LangController;
use App\Http\Controllers\Client\ContactController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\ImageController;

/**
 * Router Admin
 */

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return "Cache & config are cleared";
});

Route::get('/ad', function () {
    return redirect()->route('dashboard');
});

Route::group(['namespace' => 'Admin','prefix' => 'admin'], function (){
    Route::get('/auth/login', [UserAdminController::class, 'getLogin'])->name('getLogin')->middleware('guest');
    Route::post('/auth/login', [UserAdminController::class, 'postLogin'])->name('postLogin');

    Route::group(['middleware' => 'verify-login'], function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'category'], function (){
            Route::get('/list-category', [CategoryAdminController::class, 'getListCategory'])->name('getCategory');
            Route::post('/list-category', [CategoryAdminController::class, 'postListCategory'])->name('postCategory');
            Route::get('/add-category', [CategoryAdminController::class, 'getAddCategory'])->name('getAddCategory');
            Route::post('/add-category', [CategoryAdminController::class, 'postAddCategory'])->name('postAddCategory');
            Route::post('/delete-category/{id}', [CategoryAdminController::class, 'deleteCategory'])->name('deleteCategory');
            Route::get('/edit-category/{id}', [CategoryAdminController::class, 'getDetailCategory'])->name('getDetailCategory');
            Route::post('/edit-category/{id}', [CategoryAdminController::class, 'postDetailCategory'])->name('postDetailCategory');
        });

        Route::group(['prefix' => 'product'], function (){
            Route::get('/list-product', [ProductAdminController::class, 'getListProduct'])->name('getProduct');
            Route::post('/list-product', [ProductAdminController::class, 'postListProduct'])->name('postProduct');
            Route::get('/add-product', [ProductAdminController::class, 'getAddProduct'])->name('getAddProduct');
            Route::post('/add-product', [ProductAdminController::class, 'postAddProduct'])->name('postAddProduct');
            Route::post('/delete-product/{id}', [ProductAdminController::class, 'deleteProduct'])->name('deleteProduct');
            Route::get('/edit-product/{id}', [ProductAdminController::class, 'getDetailProduct'])->name('getDetailProduct');
            Route::post('/edit-product/{id}', [ProductAdminController::class, 'postDetailProduct'])->name('postDetailProduct');
        });

        Route::group(['prefix' => 'service'], function (){
            Route::get('/list-service', [ServiceAdminController::class, 'getListService'])->name('getService');
            Route::post('/list-service', [ServiceAdminController::class, 'postListService'])->name('postService');
            Route::get('/add-service', [ServiceAdminController::class, 'getAddService'])->name('getAddService');
            Route::post('/add-service', [ServiceAdminController::class, 'postAddService'])->name('postAddService');
            Route::post('/delete-service/{id}', [ServiceAdminController::class, 'deleteService'])->name('deleteService');
            Route::get('/edit-service/{id}', [ServiceAdminController::class, 'getDetailService'])->name('getDetailService');
            Route::post('/edit-service/{id}', [ServiceAdminController::class, 'postDetailService'])->name('postDetailService');
        });

        Route::group(['prefix' => 'news'], function (){
            Route::get('/list-news', [NewsAdminController::class, 'getListNews'])->name('getNews');
            Route::post('/list-news', [NewsAdminController::class, 'postListNews'])->name('postNews');
            Route::get('/add-news', [NewsAdminController::class, 'getAddNews'])->name('getAddNews');
            Route::post('/add-news', [NewsAdminController::class, 'postAddNews'])->name('postAddNews');
            Route::post('/delete-news/{id}', [NewsAdminController::class, 'deleteNews'])->name('deleteNews');
            Route::get('/edit-news/{id}', [NewsAdminController::class, 'getDetailNews'])->name('getDetailNews');
            Route::post('/edit-news/{id}', [NewsAdminController::class, 'postDetailNews'])->name('postDetailNews');
        });

        Route::group(['prefix' => 'contact'], function (){
            Route::get('/list-contact', [ContactAdminController::class, 'getListContact'])->name('getContact');
            Route::post('/list-contact', [ContactAdminController::class, 'postListContact'])->name('postContact');
            Route::get('/edit-contact/{id}', [ContactAdminController::class, 'getDetailContact'])->name('getDetailContact');
            Route::post('/edit-contact/{id}', [ContactAdminController::class, 'postDetailContact'])->name('postDetailContact');
            Route::post('/feedback/{id}', [ContactAdminController::class, 'postFeedback'])->name('postFeedback');
        });

        Route::group(['prefix' => 'images'], function (){
            Route::get('/list-images', [ImageController::class, 'getListImage'])->name('getImage');
            Route::post('/list-images', [ImageController::class, 'postListImage'])->name('postImage');
            Route::get('/add-images', [ImageController::class, 'getAddImage'])->name('getAddImage');
            Route::post('/add-images', [ImageController::class, 'postAddImage'])->name('postAddImage');
            Route::get('/edit-images/{id}', [ImageController::class, 'getDetailImage'])->name('getDetailImage');
            Route::post('/edit-images/{id}', [ImageController::class, 'postDetailImage'])->name('postDetailImage');
        });

        Route::group(['prefix' => 'auth'], function (){
            Route::get('/list-user', [UserAdminController::class, 'getListUser'])->name('getUser');
            Route::post('/list-user', [UserAdminController::class, 'postListUser'])->name('postUser');
            Route::get('/add-user', [UserAdminController::class, 'getAddUser'])->name('getAddUser');
            Route::post('/add-user', [UserAdminController::class, 'register'])->name('postAddUser');
            Route::get('/edit-user/{id}', [UserAdminController::class, 'getDetailUser'])->name('getDetailUser');
            Route::post('/edit-user/{id}', [UserAdminController::class, 'postDetailUser'])->name('postDetailUser');

            Route::get('/profile', [UserAdminController::class, 'profile'])->name('profile');
            Route::post('/profile', [UserAdminController::class, 'updateProfile'])->name('updateProfile');
            Route::get('/change-password', [UserAdminController::class, 'changePassword'])->name('changePassword');
            Route::post('/change-password', [UserAdminController::class, 'postChangePassword'])->name('postChangePassword');
            Route::get('/logout', [UserAdminController::class, 'logout'])->name('logout');
        });

    });
});



/**
 * Router Client
 */
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{langudage}' ,[LangController::class, 'changeLanguage'])->name('change-language');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news', [NewsController::class, 'InfoBlog'])->name('infoBlog');
Route::post('/search', [NewsController::class, 'search'])->name('search');
Route::get('/product', [ProductController::class, 'DetailProduct'])->name('detailProduct');
// Route::get('/product/{query}', [ProductController::class, 'detailProductHome'])->name('detailProductHome');
Route::post('/sendmail',[ContactController::class,'SendMail'])->name('sendMail');