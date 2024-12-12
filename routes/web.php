<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    /** Define a GET route for the /arts URL */
    /** This will call the index method from the ArtController when accessed*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/arts', [ArtController::class, 'index'])->name('arts.index');
    Route::get('/arts/create', [ArtController::class, 'create'])->name('arts.create');
    Route::get('/arts/{art}', [ArtController::class, 'show'])->name('arts.show');
    Route::post('/arts', [ArtController::class, 'store'])->name('arts.store');
    Route::get('/arts/{art}/edit', [ArtController::class, 'edit'])->name('arts.edit');
    Route::put('/arts/{art}', [ArtController::class, 'update'])->name('arts.update');
    Route::delete('/arts/{art}', [ArtController::class, 'destroy'])->name('arts.destroy');

    Route::resource('reviews',ReviewController::class);
    Route::post('arts/{art}/reviews',[ReviewController::class, 'store'])->name('reviews.store');

    Route::resource('genres',GenreController::class)->middleware('auth');
});

require __DIR__.'/auth.php';
