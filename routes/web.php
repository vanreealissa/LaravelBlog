<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Routing\Route as RoutingRoute;

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

    //Alle blogs
    Route::get('/', [BlogController::class, 'index']);

    // show formulier
    Route::get('/blogs/create', [BlogController::class, 'create'])->middleware('auth');

    // Store blogs data
    Route::post('/blogs', [BlogController::class, 'store'])->middleware('auth');

    // edit formulier
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->middleware('auth');

    // update blog
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->middleware('auth');

     // verwijder blog
     Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->middleware('auth');

    //beheer blogs
    Route::get('/blogs/manage', [BlogController::class,'manage'])->middleware('auth');

   // 1 blog
   Route::get('/blogs/{blog}', [BlogController::class, 'show']);

    // laat register zien
    Route::get('/register', [UserController::class, 'create'])->middleware('guest');;

    //create user
    Route::post('/users', [UserController::class,'store']); 

    // log gebruiker uit
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

    //laat login zien
    Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

    // log gebruiker in
    Route::match(['get', 'post'], '/users/authenticate', [UserController::class, 'authenticate']);

    Route::post('/blogs/{blogId}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');


    // index - Laat alle blogs zien
    // show - Laat enkele blogs zien
    // create - laat formulier zien om een blog te maken
    // store - sla nieuwe blog op
    // edit - laat formulier zien om blog te editen 
    // update - update een blog
    // destroy - verwijder blog