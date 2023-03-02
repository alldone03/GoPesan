<?php

use App\Http\Controllers\dashboardadmincont;
use App\Http\Controllers\dashboardcont;
use App\Http\Controllers\editmenuController;
use App\Http\Controllers\editUserController;
use App\Http\Controllers\logincont;
use App\Http\Controllers\pesancont;
use App\Http\Controllers\promotecont;
use App\Http\Controllers\registercont;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('guest')->group(function () {

    Route::post('/login', [logincont::class, 'login']);
    Route::get('/login', [logincont::class, 'index'])->name('login');
    Route::get('/register', [registercont::class, 'index'])->name('register');
    Route::post('/register', [registercont::class, 'register']);
    Route::get('/akjshdoehiaosifoanohkas/{id}', [editUserController::class, 'editstatepy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/login ');
    });

    // Route::get('/register', [registercont::class, 'index']);
    // Route::post('/register', [registercont::class, 'register']);
    Route::get('/deleteitem/{id}', [dashboardadmincont::class, 'delete']);
    Route::controller(dashboardcont::class)->prefix('dashboard')->group(function () {
        Route::get('',  'index')->name('dashboard');
        Route::get('check', 'checktable')->name('dashboard/check');
        Route::get('updatelistpesanan', 'updatelistpesanan')->name('dashboard/updatelistpesanan');
        Route::get('ambildata/{id}', 'ambildata')->name('dashboard/ambildata');
    });

    Route::get('/dashboardadmin', [dashboardadmincont::class, 'index']);
    Route::post('/edit', [dashboardadmincont::class, 'edit']);

    Route::post('/logout', [logincont::class, 'logout']);
    Route::get('/pesan', [pesancont::class, 'index']);
    Route::post('/pesan', [pesancont::class, 'pesan']);
    Route::controller(promotecont::class)->prefix('promoteuser')->group(function () {

        Route::get('/', 'index')->middleware('role_user')->name('promote');
        Route::post('/', 'promote')->middleware('role_user')->name('promote/promote');
        Route::get('/{id}', 'deleteuser')->middleware('role_user')->name('promote/delete');
    });
    Route::post('/tambahMenu', [pesancont::class, 'tambahmenu']);
    Route::controller(editmenuController::class)->prefix('editmenu')->group(function () {
        Route::get('', 'index')->name('editmenu');
        Route::get('delete/{id}', 'delete')->name('editmenu/delete');
        Route::post('update', 'update')->name('editmenu/update');
    });
    Route::controller(editUserController::class)->prefix('edituser')->group(function () {
        Route::get('', 'index')->name('edituser');
        Route::post('update', 'update')->name('edituser/update');
        Route::post('/editstate', 'editstate')->name('edituser/updatestate');
    });
});
