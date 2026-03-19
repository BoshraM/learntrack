<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\UserProgressController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    Route::resource('challenges', ChallengeController::class)->except(['index', 'show']);
    Route::post('/challenges/{challenge}/complete', [UserProgressController::class, 'complete'])
    ->name('challenges.complete');
});

Route::resource('categories', CategoryController::class)->only(['index', 'show']);
Route::resource('challenges', ChallengeController::class)->only(['index', 'show']);

Route::get('/dashboard', function () {
    $user = auth()->user();
    $completedChallenges = $user->completedChallenges()->with('category')->latest()->get();

    return view('dashboard', compact('completedChallenges'));
})->middleware(['auth'])->name('dashboard');