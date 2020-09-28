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

// Route::get('/', function () {
//     return view('public.index');
// });

// Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('create', 'Auth\RegisterController@create');

//Route for normal user
// Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile');
    Route::get('/get_profile', 'HomeController@get_profile');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/blog_detail', 'HomeController@blog_detail')->name('blog_detail');
    Route::get('/product', 'HomeController@product_detail')->name('product_detail');
    Route::post('/comment', 'HomeController@comment');
// });
//Route for admin
// Route::group(['prefix' => 'admin'], function(){
//     Route::group(['middleware' => ['admin']], function(){
        Route::resource('admin/blogs','admin\BlogController');
        Route::resource('admin/customers','admin\CustomerController');
        Route::resource('admin/products','admin\ProductController');
        Route::resource('admin/xml','admin\XMLController');
        Route::get('admin/dashboard', 'admin\AdminController@index');
//     });
// });
