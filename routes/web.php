<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('articles', ArticleController::class)->only(['index', 'show']);

Route::get('/debug-user', function () {
    if (auth()->check()) {
        return [
            'email' => auth()->user()->email,
            'is_admin' => auth()->user()->is_admin,
        ];
    }
    return 'Not logged in';
});

use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/create-temp-admin', function () {
    User::create([
        'name' => 'Temporary Admin',
        'email' => 'tempadmin@example.com',
        'password' => Hash::make('password123'),
        'is_admin' => true,
    ]);
    return 'Temporary admin user created!';
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

require __DIR__ . '/auth.php';
