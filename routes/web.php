<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CampaignController;

// Public routes
Route::get('/', [ViewController::class, 'home'])->name('home');
Route::get('/campaigns', [ViewController::class, 'campaigns'])->name('campaigns');
Route::get('/campaigns/{campaign}', [ViewController::class, 'campaignDetail'])->name('campaign.detail');
Route::get('/about', [ViewController::class, 'about'])->name('about');
Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [ViewController::class, 'showLogin'])->name('login');
    Route::get('/register', [ViewController::class, 'showRegister'])->name('register');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    // Campaign management
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaign.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaign.store');
    Route::get('/campaigns/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
    Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])->name('campaign.update');
    Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaign.destroy');
    
    // Donation routes
    Route::post('/campaigns/{campaign}/donate', [CampaignController::class, 'donate'])->name('campaign.donate');
    Route::get('/donations', [CampaignController::class, 'donations'])->name('donations');
});

// post related routes
Route::group(['prefix' => 'post', 'controller' => PostController::class], function () {

    // show a specific post
    Route::get('/{post}/show', 'show')->name('post.show');

    Route::middleware(AuthMiddleware::class)
        ->group(function(){

            // delete a post
            Route::delete('/{post}/delete', 'delete')->name('post.delete');

            // show create post form
            Route::get('/create', 'create')->name('post.create');

            // store a post
            Route::post('/store', 'store')->name('post.store');

            Route::get('/{post}/edit', 'edit')->name('post.edit');

            // update post
            Route::put('/{post}/update', 'update')->name('post.update');
        });
});
