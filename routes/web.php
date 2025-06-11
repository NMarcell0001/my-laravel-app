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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('/run-admin-setup', function (Request $request) {
    // IMPORTANT: Change 'YOUR_SECRET_KEY_HERE' to a strong, random string!
    // This provides a minimal level of security.
    $secretKey = env('ADMIN_SETUP_SECRET', 'a_very_insecure_default_key'); // Use an env variable for better security
    // For this temporary fix, we'll allow a query parameter or use the default if env not set
    if ($request->query('key') !== $secretKey) {
        abort(403, 'Unauthorized access to setup route.');
    }

    try {
        // Run the UserSeeder to add the new admin user (firstOrCreate prevents duplicates)
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);
        echo "UserSeeder executed successfully.<br>";

        // Clear all Laravel caches
        Artisan::call('optimize:clear');
        echo "Application caches cleared.<br>";

        return "Admin setup complete. Please log out and log back in.";

    } catch (\Exception $e) {
        return "An error occurred: " . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';
