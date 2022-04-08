<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardBlogsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, "home"])->name("home");
Route::get('/blogs', [SiteController::class, "blogs"])->middleware("auth");
Route::get('/blogs/{blogs:slug}', [SiteController::class, "blog"])->middleware("auth");
Route::get('/developer', [SiteController::class, "developer"])->middleware("auth");
Route::get('/categories', [SiteController::class, "categories"])->middleware("auth");

Route::get('/login', [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"])->middleware("auth");

Route::get('/register', [RegisterController::class, "index"])->middleware("guest");
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/dashboard', function() {
    return view("dashboard.index");
})->middleware("auth");

Route::resource('/dashboard/blogs', DashboardBlogsController::class)->middleware("auth");
Route::resource('/dashboard/categories', AdminCategoryController::class)->except("show")->middleware("isAdmin");

Route::post("/blogs/{blogs:slug}", [SiteController::class, "like"])->middleware("auth");
Route::post("/blogs/{blogs:slug}/comment", [SiteController::class, "comments"])->middleware("auth");