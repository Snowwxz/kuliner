<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function (\Illuminate\Http\Request $request) {
    $query = App\Models\Kuliner::with('daerah')->orderBy('rating', 'desc');
    
    if ($request->has('daerah')) {
        $query->where('daerah_id', $request->daerah);
    }

    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_kuliner', 'like', "%{$search}%")
              ->orWhereHas('daerah', function($q) use ($search) {
                  $q->where('nama_daerah', 'like', "%{$search}%");
              });
        });
    }
    
    $kuliners = $query->get();
    $daerahs = App\Models\Daerah::all();
    
    return view('landing_page', compact('kuliners', 'daerahs'));
})->name('landing');

Route::get('/welcome', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/kuliner/{id}', [App\Http\Controllers\KulinerController::class, 'show'])->name('kuliner.detail');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', [App\Http\Controllers\KulinerController::class, 'index'])->name('admin');
    Route::post('/kuliner', [App\Http\Controllers\KulinerController::class, 'store'])->name('kuliner.store');
    Route::delete('/kuliner/{id}', [App\Http\Controllers\KulinerController::class, 'destroy'])->name('kuliner.destroy');
    
    Route::get('/daerah', [App\Http\Controllers\DaerahController::class, 'index'])->name('daerah');
    Route::post('/daerah', [App\Http\Controllers\DaerahController::class, 'store'])->name('daerah.store');
    Route::delete('/daerah/{id}', [App\Http\Controllers\DaerahController::class, 'destroy'])->name('daerah.destroy');

    Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback.index');
});
