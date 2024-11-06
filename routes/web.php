<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\ProfileController;

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


});

require __DIR__.'/auth.php';
